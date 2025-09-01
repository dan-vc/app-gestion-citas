<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointments::all();
        return response()->json($appointments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointment = Appointments::create($request->all());
        return response()->json($appointment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $appointment = Appointments::find($id);
        if ($appointment) {
            return response()->json($appointment);
        } else {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment = Appointments::find($id);
        if ($appointment) {
            $appointment->update($request->all());
            return response()->json($appointment);
        } else {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointments::find($id);
        if ($appointment) {
            $appointment->delete();
            return response()->json(['message' => 'Appointment deleted']);
        } else {
            return response()->json(['message' => 'Appointment not found'], 404);
        }
    }
}
