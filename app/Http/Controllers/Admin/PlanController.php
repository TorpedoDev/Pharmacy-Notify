<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PeriodTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $plans = Plan::query()->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->when($request->filled('period_type'), function ($query) use ($request) {
            $query->where('period_type', $request->period_type);
        })->when($request->filled('is_active'), function ($query) use ($request) {
            $query->where('is_active', $request->is_active);
        }) ->latest()
        ->paginate(10)
        ->withQueryString();

        $periodTypes = PeriodTypes::cases();
        // $plans = Plan::paginate(10);
         if ($request->ajax()) {
        return view('admin.plans.partials.table', compact('plans'))->render();
    }
        return view("admin.plans.index" , compact("plans" , "periodTypes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodTypes = PeriodTypes::cases();
        return view("admin.plans.create" , compact("periodTypes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlanRequest $request)
    {
        Plan::create($request->validated());
        return redirect()->route("admin.plans.index")->with("success" , __('custom.Plan Added Successfully'));
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
    public function edit(Plan $plan)
    {
        if(! $plan)
            {
                return ;
            }
      $periodTypes = PeriodTypes::cases();
      return view("admin.plans.edit" , compact("plan" , "periodTypes"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlanRequest $request, Plan $plan)
    {
        $plan->update($request->validated());
        return redirect()->route("admin.plans.index")->with("success" , __("custom.Plan Updated Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
  

    public function destroy(Plan $plan)
{
    $plan->delete();

    return response()->json([
        'message' => __("custom.Plan Deleted Successfully.")
    ]);
}


public function toggleStatus(Plan $plan)
{
    $plan->is_active = ! $plan->is_active;
    $plan->save();
    $msg = $plan->is_active ? __("custom.Plan Activated Successfully") : __("custom.Plan Deactivated Successfully");
    return redirect()->route("admin.plans.index")->with("success" , $msg);
}

}
