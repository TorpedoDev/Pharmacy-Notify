<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\MissingMedicationRequest;
use App\Models\MissingMedication;
use Illuminate\Http\Request;

class MissingMedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $medications = MissingMedication::query()->where("tenant_id" , auth("web")->user()->tenant_id)->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })->
        latest()
        ->paginate(10)
        ->withQueryString();

         if ($request->ajax()) {
        return view('user.missingmedications.partials.table', compact('medications'))->render();
    }
        return view("user.missingmedications.index" , compact("medications"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.missingmedications.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MissingMedicationRequest $request)
    {
        $data = $request->validated();
        $data["tenant_id"] = auth("web")->user()->tenant_id;
        $data["created_by"] = auth("web")->user()->id;
        MissingMedication::create($data);
        return redirect()->route("missingmedications.index")->with("success" , __("custom.Medication Added Successfully"));

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
    public function edit(MissingMedication $missingmedication)
    {
        if($missingmedication->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
        
        return view("user.missingmedications.edit" , compact("missingmedication"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MissingMedicationRequest $request, MissingMedication $missingmedication)
    {
        if($missingmedication->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

        $missingmedication->update($request->validated());
        return redirect()->route("missingmedications.index")->with("success" , __("custom.Medication Updated Successfully"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MissingMedication $missingmedication)
    {
          if($missingmedication->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
        $missingmedication->delete();
        return response()->json([
            "message" => __("custom.Medication Deleted Successfully")
        ]);
    }
}
