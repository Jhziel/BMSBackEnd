<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangayOfficial;
use Illuminate\Http\Request;

class BarangayOfficialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangayOfficials = BarangayOfficial::orderBy('created_at', 'desc')->get();
        return response()->json($barangayOfficials, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'birthdate' => ['required', 'date'],
            'term_start' => ['required', 'date'],
            'term_end' => ['required', 'date'],
            'gender' => ['required'],
            'position' => ['required'],
            'civil_status' => ['required'],
            'contact_number' => ['required', 'unique:residents', 'size:11'],

        ]);

        $barangay_official = BarangayOfficial::create($validatedData);
        return response()->json($barangay_official, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangayOfficial $barangayOfficial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangayOfficial $barangayOfficial)
    {
        $validatedData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'birthdate' => ['required', 'date'],
            'term_start' => ['required', 'date'],
            'term_end' => ['required', 'date'],
            'gender' => ['required'],
            'position' => ['required'],
            'civil_status' => ['required'],
            'contact_number' => ['required', 'unique:residents', 'size:11'],

        ]);

        $barangayOfficial->update($validatedData);
        return response()->json($barangayOfficial, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangayOfficial $barangayOfficial)
    {
        $barangayOfficial->delete();

        return response()->noContent();
    }
}
