<?php

namespace App\Http\Controllers;

use App\Models\Diagnoses;
use App\Models\Doctors;
use App\Models\Patients;
use Illuminate\Http\Request;

class DiagnosticoContoller extends Controller
{
    // Mostrar lista de diagnósticos
    public function index()
    {
        $diagnoses = Diagnoses::all();
        $doctors = Doctors::all();
        $patients = Patients::all();
        return view('diagnoses.index', compact('diagnoses', 'doctors', 'patients'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('diagnoses.create');
    }

    // Guardar nuevo diagnóstico
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'severity' => 'required|string',
            'recommendations' => 'nullable|string',
            'diagnosis_type' => 'required|string'
        ]);

        Diagnoses::create($validatedData);

        return redirect()->route('diagnoses.index')->with('success', 'Diagnóstico creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $diagnose = Diagnoses::findOrFail($id);
        $doctors = Doctors::all();
        $patients = Patients::all();
        return view('diagnoses.edit', compact('diagnose', 'doctors', 'patients'));
    }

    // Actualizar diagnóstico
    public function update(Request $request, $id)
    {
        $diagnosis = Diagnoses::findOrFail($id);

        $validatedData = $request->validate([
            'description' => 'required|string',
            'date' => 'required|date',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'severity' => 'required|string',
            'recommendations' => 'nullable|string',
            'diagnosis_type' => 'required|string'
        ]);

        $diagnosis->update($validatedData);

        return redirect()->route('diagnoses.index')->with('success', 'Diagnóstico actualizado correctamente.');
    }

    // Eliminar diagnóstico
    public function destroy($id)
    {
        $diagnosis = Diagnoses::findOrFail($id);
        $diagnosis->delete();

        return redirect()->route('diagnoses.index')->with('success', 'Diagnóstico eliminado correctamente.');
    }
}
