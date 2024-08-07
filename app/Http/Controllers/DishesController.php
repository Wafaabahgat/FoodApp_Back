<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dish::all();
        return view(
            'layout.admin.Dishes.index',
            [
                'data' => $data
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Dish $dish)
    {
        $restaurant = Restaurant::all();
        $category = Category::all();

        return view(
            'layout.admin.Dishes.create',
            compact('dish', 'restaurant', 'category')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        Dish::create($request->all());

        return redirect()->route('dishes.index')
            ->with('success', 'Dish created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $restaurant = Restaurant::all();
        $category = Category::all();
        return view('layout.admin.Dishes.edit', compact('dish', 'restaurant', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
            // 'category_id' => 'required|exists:id',
        ]);

        $dish->update($request->all());

        return redirect()->route('dishes.index')
            ->with('success', 'Dish created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('dishes.index')
            ->with('success', 'Dish deleted successfully.');
    }
}