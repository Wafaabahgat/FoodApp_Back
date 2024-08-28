<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::with(
            'dishes',
            // :id,restaurant_id, category_id,name, price',
            'orders',
            'branches'
        )->paginate();
        return Helper::sendSuccess('', $restaurants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        Restaurant::create($request->all());

        return Helper::sendSuccess('Restaurant created successfully', '', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->image = url('storage/' . $restaurant->image);

        if (!$restaurant) {
            return Helper::sendError('Restaurant not found', [], 404);
        }
        return Helper::sendSuccess('', $restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if (!$restaurant) {
            return Helper::sendError('Restaurant not found', [], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string',
            'phone' => 'sometimes|required|string',
        ]);

        $restaurant->update($validated);

        return Helper::sendSuccess('Restaurant updated successfully', '', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if (!$restaurant) {
            return Helper::sendError('Restaurant not found', [], 404);
        }

        $restaurant->delete();
        return Helper::sendSuccess('Restaurant deleted successfully', '', 201);
    }
}