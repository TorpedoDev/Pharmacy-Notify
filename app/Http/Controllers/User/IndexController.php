<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        $plans = Plan::where("is_active" , true)->get(); // ->where("features" , "!=" , null)
        return view('welcome' , compact("plans"));
    }

    public function storeTenant(Request $request)
    {
       
         $validated = $request->validate([
            'pharmacy_name' => ['required', 'string', 'max:255'],
            'phone'         => ['required', 'string', 'max:20'],
            'owner_name'    => ['required', 'string'],
            'email'         => ['required', 'email', 'unique:users,email'],
            'password'      => ['required', 'min:8'],
        ]);

        // بنعمل hash للباسورد قبل ما نخزنه في السيشن
        $validated['password'] = Hash::make($validated['password']);

        session(['pending_pharmacy' => $validated]);
        return redirect()->route('whatsapp.connect');
    }

    public function showWhatsappEmbedded(Request $request)
    {
             if (!$request->session()->has('pending_pharmacy')) {
            return redirect()->route('pharmacy.register')
                ->with('error', 'من فضلك ابدأ بتسجيل بيانات الصيدلية أولاً');
        }

        return view('whatsapp-connect', [
            'metaAppId'    => config('services.meta.app_id'),
            'metaConfigId' => config('services.meta.whatsapp_config_id'),
        ]);
    }

    public function handleWhatsappEmbedded(Request $request)
    {
        $validated = $request->validate([
            'code'            => ['required', 'string'],
            'waba_id'         => ['required', 'string'],
            'phone_number_id' => ['required', 'string'],
        ]);

        $pharmacyData = $request->session()->get('pending_pharmacy');

        if (!$pharmacyData) {
            return response()->json(['error' => 'انتهت الجلسة، من فضلك ابدأ التسجيل من جديد'], 400);
        }

        // تبديل الكود بتوكن
        $response = Http::get('https://graph.facebook.com/v24.0/oauth/access_token', [
            'client_id'     => config('services.meta.app_id'),
            'client_secret' => config('services.meta.app_secret'),
            'code'          => $validated['code'],
        ]);

        if (!$response->successful()) {
            return response()->json(['error' => 'فشل تبديل الكود بتوكن'], 400);
        }

        $accessToken = $response->json()['access_token'];

        // دلوقتي بس بنعمل الإنشاء الفعلي في الداتابيز
        $user = DB::transaction(function () use ($pharmacyData, $validated, $accessToken) {
           

            $tenant =  Tenant::create([
                'name'            => $pharmacyData['pharmacy_name'],
                'phone'                    => $pharmacyData['phone'],
                'owner_name'              => $pharmacyData['owner_name'],
                'whatsapp_waba_id'         => $validated['waba_id'],
                'whatsapp_phone_number_id' => $validated['phone_number_id'],
                'whatsapp_access_token'    => $accessToken,
                'whatsapp_connected'       => true,
                'whatsapp_token_expires_at' => now()->addDays(60)
            ]);

             return User::create([
                'name'     => $pharmacyData['pharmacy_name'],
                'email'    => $pharmacyData['email'],
                'password' => $pharmacyData['password'], // متعمل hash بالفعل من الخطوة الأولى
                'tenant_id' => $tenant->id
            ]);
        });

        $request->session()->forget('pending_pharmacy');

        return response()->json([
            'success'  => true,
            'redirect' => route('login'),
        ]);

    }
}
