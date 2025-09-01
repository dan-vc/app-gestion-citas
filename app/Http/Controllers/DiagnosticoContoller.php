<?php

namespace App\Http\Controllers;

use App\Models\Diagnoses;
use Illuminate\Http\Request;

class DiagnosticoContoller extends Controller
{
    // Mostrar lista de diagnósticos
    public function index()
    {
        $diagnoses = Diagnoses::with(['patient', 'doctor'])->get();
        return view('diagnostico', compact('diagnoses'));
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

    // Mostrar un diagnóstico en específico
    public function show($id)
    {
        $diagnosis = Diagnoses::with(['patient', 'doctor'])->findOrFail($id);
        return view('diagnoses.show', compact('diagnosis'));
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $diagnosis = Diagnoses::findOrFail($id);
        return view('diagnoses.edit', compact('diagnosis'));
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
