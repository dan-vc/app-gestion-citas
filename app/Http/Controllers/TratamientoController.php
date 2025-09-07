<?php

namespace App\Http\Controllers;

use App\Models\Diagnoses;
use App\Models\Doctors;
use App\Models\Treatments;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    // Mostrar todos los tratamientos
    public function index()
    {
        $treatments = Treatments::all();
        $diagnoses = Diagnoses::all();
        $doctors = Doctors::all();
        return view('treatments.index', compact('treatments', 'diagnoses', 'doctors'));
    }

    // Guardar un nuevo tratamiento
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'diagnosis_id' => 'required|integer|exists:diagnoses,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'status' => 'required|string|max:50',
            'administration_frequency' => 'required|string|max:100',
        ]);

        Treatments::create($validatedData);

        return redirect()->route('treatments.index')->with('success', 'Tratamiento creado correctamente.');
    }

    // Mostrar un tratamiento específico
    public function edit($id)
    {
        $treatment = Treatments::findOrFail($id);
        $diagnoses = Diagnoses::all();
        $doctors = Doctors::all();
        return view('treatments.edit', compact('treatment', 'diagnoses', 'doctors'));
    }

    // Actualizar un tratamiento
    public function update(Request $request, $id)
    {
        $treatment = Treatments::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'diagnosis_id' => 'required|integer|exists:diagnoses,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'status' => 'required|string|max:50',
            'administration_frequency' => 'required|string|max:100',
        ]);

        $treatment->update($validatedData);

        return redirect()->route('treatments.index')->with('success', 'Tratamiento actualizado correctamente.');
    }

    // Eliminar un tratamiento
    public function destroy($id)
    {
        $treatment = Treatments::findOrFail($id);
        $treatment->delete();
        return redirect()->route('treatments.index')->with('success', 'Tratamiento eliminado correctamente.');
    }
}
