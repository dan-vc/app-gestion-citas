<?php

namespace App\Http\Controllers;

use App\Models\Medications;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    // Mostrar todos los medicamentos
    public function index()
    {
        $medications = Medications::all();
        return view('medicamiento')->with('medications', $medications);
    }

    // Mostrar un medicamento específico
    public function show($id)
    {
        $medication = Medications::findOrFail($id);
        return view('medications.show')->with('medication', $medication);
    }

    // Eliminar un medicamento
    public function destroy($id)
    {
        $medication = Medications::findOrFail($id);
        $medication->delete();
        return redirect()->route('medications.index')->with('success', 'Medicamento eliminado correctamente.');
    }
}
