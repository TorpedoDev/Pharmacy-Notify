<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UsersRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query()->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->where('tenant_id' , auth("web")->user()->tenant_id)
        ->latest()
        ->paginate(10)
        ->withQueryString();

         if ($request->ajax()) {
        return view('user.users.partials.table', compact('users'))->render();
    }
        return view("user.users.index" , compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersRequest $request)
    {
        $data = $request->validated();
        $data["tenant_id"] = auth("web")->user()->tenant_id;

$msg = $this->checkUsersPerTenant($data["tenant_id"]);

        if($msg != null)
            {
                return redirect()->back()->with("error" , $msg);
            }
        unset($data["password_confirmation"]);
        User::create($data);
       return redirect()->route("users.index")->with("success" , __("custom.User Added Successfully"));

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
        if($user->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
         return view("user.users.edit" , compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, User $user)
    {
        if($user->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

         $data = $request->validated();
       

         $user->update([
            "name" => $data["name"],
            "email" => $data["email"],
         ]);

         if($request->filled("password"))
            {
                $user->password = Hash::make($request->password);
                $user->save();
            }

        return redirect()->route("users.index")->with("success" , __("custom.User Updated Successfully"));
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

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
