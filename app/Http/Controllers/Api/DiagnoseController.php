<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diagnoses;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnoses = Diagnoses::all(); 
        return response()->json($diagnoses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $diagnose = Diagnoses::create($request->all());
        return response()->json($diagnose, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diagnose = Diagnoses::find($id);
        if ($diagnose) {
            return response()->json($diagnose);
        } else {
            return response()->json(['message' => 'Diagnose not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $diagnose = Diagnoses::find($id);
        if ($diagnose) {
            $diagnose->update($request->all());
            return response()->json($diagnose);
        } else {
            return response()->json(['message' => 'Diagnose not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnose = Diagnoses::find($id);
        if ($diagnose) {
            $diagnose->delete();
            return response()->json(['message' => 'Diagnose deleted']);
        } else {
            return response()->json(['message' => 'Diagnose not found'], 404);
        }
    }
}
