<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patients::all();
        return view('patient.index')->with('patients', $patients);
    }

    public function create(Request $request)
    {
        Patients::create();
        return redirect()->route('patient.index')->with('success', 'Patient created successfully.');
    }

    public function show($id)
    {
        $patient = Patients::findOrFail($id);
        return view('patient.show')->with('patient', $patient);
    }

    public function update(Request $request, $id)
    {
        $patient = Patients::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer',
            'email' => 'sometimes|required|email|unique:patients,email,' . $patient->id,
        ]);

        $patient->update($validatedData);
        return redirect()->route('patient.index')->with('success', 'Patient updated successfully.');
    }

    public function destroy($id)
    {
        $patient = Patients::findOrFail($id);
        $patient->delete();
        return redirect()->route('patient.index')->with('success', 'Patient deleted successfully.');
    }
}
