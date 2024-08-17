<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image|max:1048576',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        Dish::create($data);

        // Dish::create($request->all());

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
            'image' => 'image|max:1048576',
            'description' => 'required',
            'price' => 'required|numeric',
            'restaurant_id' => 'required|exists:restaurants,id',
            // 'category_id' => 'required|exists:id',
        ]);

        $old_image = $dish->image;

        $data = $request->except('image');
        $new_img = $this->uploadImage($request);

        if ($new_img) {
            $data['image'] = $new_img;
        }

        $dish->update($data);

        if ($old_image && $new_img) {
            Storage::disk('public')->delete($old_image);
        }

        // $dish->update($request->all());

        return redirect()->route('dishes.index')
            ->with('success', 'Dish created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Restaurant::findOrFail($id);
        $dish->delete();

        if ($dish->image) {
            Storage::disk('public')->delete($dish->image);
        }

        return redirect()->route('dishes.index')
            ->with('success', 'Dish deleted successfully.');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }

        $file = $request->file('image'); //uploadFile object
        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        // dd($path);
        return $path;
    }
}