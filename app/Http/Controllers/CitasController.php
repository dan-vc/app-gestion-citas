<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function index()
    {
        $appointments = Appointments::all();
        return view('citas')->with('appointments', $appointments);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date'         => 'required|date',
            'reason'       => 'required|string|max:255',
            'patient_id'   => 'required|exists:patients,id',
            'doctor_id'    => 'required|exists:doctors,id',
            'status'       => 'required|string|max:50', // ejemplo: pendiente, confirmada, cancelada
            'observations' => 'nullable|string',
            'room'         => 'nullable|string|max:50',
        ]);

        Appointments::create($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Cita creada correctamente.');
    }

    public function show($id)
    {
        $appointment = Appointments::findOrFail($id);
        return view('appointments.update')->with('appointment', $appointment);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointments::findOrFail($id);

        $validatedData = $request->validate([
            'date'         => 'required|date',
            'reason'       => 'required|string|max:255',
            'patient_id'   => 'required|exists:patients,id',
            'doctor_id'    => 'required|exists:doctors,id',
            'status'       => 'required|string|max:50',
            'observations' => 'nullable|string',
            'room'         => 'nullable|string|max:50',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('appointments.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Cita eliminada correctamente.');
    }
}
