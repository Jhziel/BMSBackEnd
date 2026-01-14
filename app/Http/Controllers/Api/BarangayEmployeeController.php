<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangayEmployee;
use Illuminate\Http\Request;

class BarangayEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangay_employees = BarangayEmployee::orderBy('created_at', 'desc')->get();
        return response()->json($barangay_employees, 200);
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
            'job_title' => ['required'],
            'employment_type' => ['required'],
            'civil_status' => ['required'],
            'contact_number' => ['required', 'size:11'],
            'citizenship' => ['required'],
            'religion' => ['required'],
            'status' => ['required'],
            'hired_at' => ['required', 'date'],
        ]);

        $barangay_employee = BarangayEmployee::create($validateData);

        return response()->json($barangay_employee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangayEmployee $barangayEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangayEmployee $barangayEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangayEmployee $barangayEmployee)
    {
        //
    }
}
