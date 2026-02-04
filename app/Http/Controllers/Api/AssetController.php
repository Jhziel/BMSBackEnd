<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::with('barangayEmployee')->orderBy('created_at', 'desc')->get();
        return response()->json($assets, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_name' => ['required'],
            'barangay_employee_id' => ['required', 'exists:barangay_employees,id'],
            'type' => ['required'],
            'serial_number' => ['required'],
            'amount' => ['required'],
            'status' => ['required'],
        ]);

        $asset = Asset::create($validatedData);

        $asset->load('barangayEmployee');

        return response()->json($asset, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $validatedData = $request->validate([
            'item_name' => ['required'],
            'barangay_employee_id' => ['required', 'exists:barangay_employees,id'],
            'type' => ['required'],
            'serial_number' => ['required'],
            'amount' => ['required'],
            'status' => ['required'],
        ]);

        $asset->update($validatedData);

        $asset->load('barangayEmployee');

        return response()->json($asset, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();

        return response()->noContent();
    }
}
