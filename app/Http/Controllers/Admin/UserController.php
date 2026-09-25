<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $users = User::query()->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->latest()
        ->paginate(10)
        ->withQueryString();

         if ($request->ajax()) {
        return view('admin.users.partials.table', compact('users'))->render();
    }
        return view("admin.users.index" , compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::all();
        return view("admin.users.create" , compact("tenants"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $msg = $this->checkUsersPerTenant($data["tenant_id"]);

        if($msg != null)
            {
                return redirect()->back()->with("error" , $msg);
            }
      
        unset($data["password_confirmation"]);
        User::create($data);
        return redirect()->route("admin.users.index")->with("success" , __("custom.User Added Successfully"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $tenants = Tenant::all();
        return view("admin.users.edit" , compact("tenants" , "user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
           
         $data = $request->validated();

        $msg = $this->checkUsersPerTenant($data["tenant_id"]);

        if($msg != null)
            {
                return redirect()->back()->with("error" , $msg);
            }

         $user->update([
            "name" => $data["name"],
            "email" => $data["email"],
            "tenant_id" => $data["tenant_id"],
         ]);

         if($request->filled("password"))
            {
                $user->password = Hash::make($request->password);
                $user->save();
            }

        return redirect()->route("admin.users.index")->with("success" , __("custom.User Updated Successfully"));
            

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
         return response()->json([
        'message' => __("custom.User Deleted Successfully")
    ]);
    }

    private function checkUsersPerTenant($id)
    {
          $tenant = Tenant::findOrFail($id);
        $lastSubscription = $tenant->subscriptions()->latest()->first();
        if($lastSubscription == null)
            {
                return __("custom.This tenant doesn't have a subscription");
            }else{
                if($tenant->users()->count() == $lastSubscription->plan->allowed_users){
                    return __("custom.This tenant has the full number of allowed users");
                }
            }

            return null;
    }
}
