<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\MedicationRequest;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $medications = Medication::query()->where("tenant_id" , auth("web")->user()->tenant_id)->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->latest()
        ->paginate(10)
        ->withQueryString();

         if ($request->ajax()) {
        return view('user.medications.partials.table', compact('medications'))->render();
    }
        return view("user.medications.index" , compact("medications"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.medications.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicationRequest $request)
    {
        $data = $request->validated();
        $data["tenant_id"] = auth("web")->user()->tenant_id;
        $data["created_by"] = auth("web")->user()->id;
        Medication::create($data);
        return redirect()->route("medications.index")->with("success" , __("custom.Medication Added Successfully"));
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
    public function edit(Medication $medication)
    {
         if($medication->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
        
        return view("user.medications.edit" , compact("medication"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicationRequest $request, Medication $medication)
    {
          if($medication->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }

        $medication->update($request->validated());
        return redirect()->route("medications.index")->with("success" , __("custom.Medication Updated Successfully"));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
          if($medication->tenant_id != auth("web")->user()->tenant_id)
        {
            return redirect()->back()->with("error" , __("custom.This item isn't exist"));
        }
          
        $medication->delete();
        return response()->json([
            "message" => __("custom.Medication Deleted Successfully")
        ]);
    }
}
