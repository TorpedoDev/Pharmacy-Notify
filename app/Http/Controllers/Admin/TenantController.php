<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tenants = Tenant::query()->when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search . '%');
        })->latest()
        ->paginate(10)
        ->withQueryString();

         if ($request->ajax()) {
        return view('admin.tenants.partials.table', compact('tenants'))->render();
    }
        return view("admin.tenants.index" , compact("tenants"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.tenants.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenantRequest $request)
    {
        $data = $request->validated();
         if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('tenants', 'public');
     }

     Tenant::create($data);

      return redirect()
        ->route("admin.tenants.index")
        ->with("success", __("custom.Tenant Added Successfully"));

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
    public function edit(Tenant $tenant)
    {
        return view("admin.tenants.edit" , compact("tenant"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenantRequest $request, Tenant $tenant)
    {
        $data = $request->validated();

    $oldLogo = $tenant->logo;

    if ($request->hasFile('logo')) {

        // Upload new logo first
        $newLogo = $request->file('logo')->store('tenants', 'public');

        $data['logo'] = $newLogo;
    }

    $tenant->update($data);

    // Delete old logo only after successful update
    if ($request->hasFile('logo') && $oldLogo) {
        Storage::disk('public')->delete($oldLogo);
    }

       return redirect()
        ->route('admin.tenants.index')
        ->with('success', __("custom.Tenant Updated Successfully."));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $oldLogo = $tenant->logo;
        if($oldLogo)
            {
                Storage::disk("public")->delete($oldLogo);
            }
         $tenant->delete();

    return response()->json([
        'message' => __("custom.Tenant Deleted Successfully")
    ]);
    }
}
