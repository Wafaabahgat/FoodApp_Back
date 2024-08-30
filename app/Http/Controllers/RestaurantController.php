<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Restaurant::all();
        return view(
            'layout.admin.Restaurants.index',
            [
                'data' => $data
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Restaurant $restaurant)
    {
        return view(
            'layout.admin.Restaurants.create',
            compact('restaurant')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slug' => 'required|string|max:255',
        ]);

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        Restaurant::create($data);
        // Restaurant::create($request->all());

        return redirect()->route('restaurants.index')
            ->with('success', 'Restaurant created successfully.');
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
    public function edit(Restaurant $restaurant)
    {
        return view('layout.admin.Restaurants.edit', compact('restaurant'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $old_image = $restaurant->image;

        $data = $request->except('image');
        $new_img = $this->uploadImage($request);

        if ($new_img) {
            $data['image'] = $new_img;
        }

        $restaurant->update($data);

        if ($old_image && $new_img) {
            Storage::disk('public')->delete($old_image);
        }

        // $restaurant->update($request->all());
        return redirect()->route('restaurants.index')
            ->with('success', 'Restaurant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        if ($restaurant->image) {
            Storage::disk('public')->delete($restaurant->image);
        }

        return redirect()->route('restaurants.index')
            ->with('success', 'Restaurant deleted successfully.');
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