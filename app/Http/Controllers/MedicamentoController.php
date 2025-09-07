<?php

namespace App\Http\Controllers;

use App\Models\Medications;
use App\Models\Treatments;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    // Mostrar todos los medicamentos
    public function index()
    {
        $medications = Medications::all();
        $treatments = Treatments::all();
        return view('medications.index', compact('medications', 'treatments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'treatment_id' => 'required|exists:treatments,id',
            'supplier' => 'nullable|string|max:255',
            'side_effects' => 'nullable|string',
        ]);

        Medications::create($validatedData);
        return redirect()->route('medications.index')->with('success', 'Medicamento creado correctamente.');
    }

    // Mostrar un medicamento específico
    public function edit($id)
    {
        $medication = Medications::findOrFail($id);
        $treatments = Treatments::all();
        return view('medications.edit', compact('medication', 'treatments'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dose' => 'required|string|max:255',
            'frequency' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'treatment_id' => 'required|exists:treatments,id',
            'supplier' => 'nullable|string|max:255',
            'side_effects' => 'nullable|string',
        ]);

        $medication = Medications::findOrFail($id);
        $medication->update($validatedData);
        return redirect()->route('medications.index')->with('success', 'Medicamento actualizado correctamente.');
    }

    // Eliminar un medicamento
    public function destroy($id)
    {
        $medication = Medications::findOrFail($id);
        $medication->delete();
        return redirect()->route('medications.index')->with('success', 'Medicamento eliminado correctamente.');
    }
}
