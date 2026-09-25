<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubscriptionRequest;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subscriptions = Subscription::query()->when($request->filled('search'), function ($query) use ($request) {
             $query->whereHas('tenant', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        });
        })->latest()
        ->paginate(10)
        ->withQueryString();

            if ($request->ajax()) {
        return view('admin.subscriptions.partials.table', compact('subscriptions'))->render();
    }
        return view("admin.subscriptions.index" , compact("subscriptions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = Plan::where("is_active" , 1)->get();
        $tenants = Tenant::all();
        return view("admin.subscriptions.create" , compact("plans" , "tenants"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request)
    {
          $data = $request->validated();
    $plan = Plan::findOrFail($data['plan_id']);

    $startDate = Carbon::parse($data['start_at']);

    $endDate = $plan->calculateEndDate($startDate);

    Subscription::create([
        'tenant_id' => $data['tenant_id'],
        'plan_id' => $plan->id,
        'start_at' => $startDate,
        'end_at' => $endDate,
    ]);

    return redirect()
        ->route("admin.subscriptions.index")
        ->with("success", __("custom.Subscription Added Successfully"));
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
    public function edit(Subscription $subscription)
    {
         $plans = Plan::where("is_active" , 1)->get();
        $tenants = Tenant::all();
        return view("admin.subscriptions.edit" , compact("plans" , "tenants" , "subscription"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
         $data = $request->validated();
         $plan = Plan::findOrFail($data['plan_id']);

        $startDate = Carbon::parse($data['start_at']);

         $endDate = $plan->calculateEndDate($startDate);

         $subscription->update([
        'tenant_id' => $data['tenant_id'],
        'plan_id' => $plan->id,
        'start_at' => $startDate,
        'end_at' => $endDate,
    ]);


    return redirect()
        ->route("admin.subscriptions.index")
        ->with("success", __("custom.Subscription Updated Successfully"));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return response()->json([
        'message' => __("custom.Subscription Deleted Successfully")
    ]);
    }
}
