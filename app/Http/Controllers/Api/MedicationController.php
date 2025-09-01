<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medications;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medications = Medications::all();
        return response()->json($medications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medication = Medications::create($request->all());
        return response()->json($medication, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $medication = Medications::find($id);
        if ($medication) {
            return response()->json($medication);
        } else {
            return response()->json(['message' => 'Medication not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $medication = Medications::find($id);
        if ($medication) {
            $medication->update($request->all());
            return response()->json($medication);
        } else {
            return response()->json(['message' => 'Medication not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medication = Medications::find($id);
        if ($medication) {
            $medication->delete();
            return response()->json(['message' => 'Medication deleted']);
        } else {
            return response()->json(['message' => 'Medication not found'], 404);
        }
    }
}
