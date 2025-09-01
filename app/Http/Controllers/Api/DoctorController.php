<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctors::all();
        return response()->json($doctors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doctor = Doctors::create($request->all());
        return response()->json($doctor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctors::find($id);
        if ($doctor) {
            return response()->json($doctor);
        } else {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = Doctors::find($id);
        if ($doctor) {
            $doctor->update($request->all());
            return response()->json($doctor);
        } else {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctors::find($id);
        if ($doctor) {
            $doctor->delete();
            return response()->json(['message' => 'Doctor deleted']);
        } else {
            return response()->json(['message' => 'Doctor not found'], 404);
        }
    }
}
