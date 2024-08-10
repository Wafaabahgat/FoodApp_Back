<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dish = Dish::all();
        return response()->json($dish);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Dish::create($request->all());
        return response()
            ->json(['message' => 'Dish created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::find($id);

        if (!$dish) {
            return response()
                ->json(['message' => 'Dish not found'], 404);
        }

        return response()
            ->json($dish);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $dish = Dish::find($id);
        if (!$dish) {
            return response()->json(['message' => 'Dish not found'], 404);
        }

        $validated = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $dish->update($validated);
        return response()
            ->json(['message' => 'Dish created successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::find($id);
        if (!$dish) {
            return response()->json(['message' => 'Dish not found'], 404);
        }

        $dish->delete();
        return response()->json(['message' => 'Dish deleted successfully']);
    }
}