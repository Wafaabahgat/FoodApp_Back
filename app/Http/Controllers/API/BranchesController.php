<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branch::all();
        return response()->json($branch);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'restaurant_id' => 'required|exists:restaurants,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        Branch::create($request->all());
        return response()
            ->json(['message' => 'Branch created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return response()
                ->json(['message' => 'Branch not found'], 404);
        }

        return response()
            ->json($branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'restaurant_id' => 'required|exists:restaurants,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        $branch->update($validated);
        return response()
            ->json(['message' => 'Branch created successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return response()->json(['message' => 'Branch not found'], 404);
        }

        $branch->delete();
        return response()->json(['message' => 'Branch deleted successfully']);
    }
}