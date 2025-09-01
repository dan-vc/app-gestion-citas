<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Treatments;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatments::all();
        return response()->json($treatments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $treatment = Treatments::create($request->all());
        return response()->json($treatment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $treatment = Treatments::find($id);
        if ($treatment) {
            return response()->json($treatment);
        } else {
            return response()->json(['message' => 'Treatment not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $treatment = Treatments::find($id);
        if ($treatment) {
            $treatment->update($request->all());
            return response()->json($treatment);
        } else {
            return response()->json(['message' => 'Treatment not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $treatment = Treatments::find($id);
        if($treatment){
            Treatments::destroy($id);
            return response()->json(['message' => 'Treatment deleted successfully']);
        } else {
            return response()->json(['message' => 'Treatment not found'], 404);
        }
    }
}
