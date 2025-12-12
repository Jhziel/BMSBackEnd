<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::all();

        return response()->json($residents, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required'],
            'civil_status' => ['required'],
            'contact_number' => ['required'],
        ]);
        $validateData['household_id'] = $request->id;
        $resident = Resident::create($validateData);
        return response()->json($resident, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        return response()->json($resident, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {
        $validateData = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'birthdate' => ['required', 'date'],
            'gender' => ['required'],
            'civil_status' => ['required'],
            'contact_number' => ['required'],
        ]);
        $validateData['household_id'] = $request->id;
        $resident->update($validateData);

        return response()->json($resident, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();

        return response()->noContent();
    }
}
