<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function index()
    {
        $doctors = Doctors::all();
        return view('doctors.index')->with('doctors', $doctors);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'specialty'        => 'required|string|max:255',
            'phone'            => 'required|string|max:20',
            'email'            => 'required|email|max:255|unique:doctors,email',
            'license'          => 'required|string|max:255|unique:doctors,license',
            'years_experience' => 'required|integer|min:0',
        ]);

        Doctors::create($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Médico creado correctamente.');
    }

    public function edit($id)
    {
        $doctor = Doctors::findOrFail($id);
        return view('doctors.edit')->with('doctor', $doctor);
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctors::findOrFail($id);

        $validatedData = $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'specialty'        => 'required|string|max:255',
            'phone'            => 'required|string|max:20',
            'email'            => 'required|email|max:255|unique:doctors,email,' . $doctor->id,
            'license'          => 'required|string|max:255|unique:doctors,license,' . $doctor->id,
            'years_experience' => 'required|integer|min:0',
        ]);

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Médico actualizado correctamente.');
    }

    public function destroy($id)
    {
        $doctor = Doctors::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Médico eliminado correctamente.');
    }
}
