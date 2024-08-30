<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dish = Dish::all()->map(function ($dishImg) {
            $dishImg->image = url('storage/' . $dishImg->image);
            return $dishImg;
        });
        return Helper::sendSuccess('', $dish);
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
            'slug' => 'required',
        ]);

        Dish::create($request->all());
        return Helper::sendSuccess('Dish created successfully', '', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::with('restaurant')->findOrFail($id);
        $dish->image = url('storage/' . $dish->image);

        // $dish = Dish::findOrFailget($id)->map(function ($dishImg) {
        //     $dishImg->image = url('storage/' . $dishImg->image);
        //     return $dishImg;
        // });

        if (!$dish) {
            return Helper::sendError('Dish not found', [], 404);
        }
        
        $response = [
            'id' => $dish->id,
            'name' => $dish->name,
            'description' => $dish->description,
            'image' => $dish->image,
            'price' => $dish->price,
            'slug' => $dish->slug,
            'restaurant_name' => $dish->restaurant->name, 
        ];

        return Helper::sendSuccess('', $response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $dish = Dish::findOrFail($id);
        if (!$dish) {
            return Helper::sendError('Dish not found', [], 404);
        }

        $validated = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'slug' => 'required',
        ]);

        $dish->update($validated);
        return Helper::sendSuccess('Dish updated successfully', '', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::findOrFail($id);
        if (!$dish) {
            return Helper::sendError('Dish not found', [], 404);
        }

        $dish->delete();
        return Helper::sendSuccess('Dish deleted successfully', '', 201);
    }
}