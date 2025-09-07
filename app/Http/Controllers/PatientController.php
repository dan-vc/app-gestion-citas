<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patients::all();
        return view('patients.index')->with('patients', $patients);
    }

    public function store(Request $request)
    {
        Patients::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient created successfully.');
    }

    public function edit($id)
    {
        $patient = Patients::findOrFail($id);
        return view('patients.edit')->with('patient', $patient);
    }

    public function update(Request $request, $id)
    {
        $patient = Patients::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender'     => 'required|string|max:20', // puedes ajustar valores permitidos
            'phone'      => 'required|string|max:20',
            'address'    => 'required|string|max:255',
            'blood_type' => 'required|string|max:3', // ejemplo: A+, O-, AB+
        ]);

        $patient->update($validatedData);

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado correctamente.');
    }


    public function destroy($id)
    {
        $patient = Patients::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
