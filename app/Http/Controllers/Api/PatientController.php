<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patients::all();
        return response()->json($patients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient = Patients::create($request->all());
        return response()->json($patient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patients::find($id);
        if ($patient) {
            return response()->json($patient);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patients::find($id);
        if ($patient) {
            $patient->update($request->all());
            return response()->json($patient);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patients::find($id);
        if ($patient) {
            $patient->delete();
            return response()->json(['message' => 'Patient deleted']);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }
}
