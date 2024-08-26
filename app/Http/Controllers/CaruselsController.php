<?php

namespace App\Http\Controllers;

use App\Models\Carusels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaruselsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Carusels::all();
        return view(
            'layout.admin.Carusels.index',
            [
                'data' => $data
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Carusels $carusels)
    {
        return view(
            'layout.admin.Carusels.create',
            compact('carusels')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|max:1048576',
        ]);

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        Carusels::create($data);
        // Carusels::create($request->all());

        return redirect()->route('carusels.index')
            ->with('success', 'Carusels created successfully.');
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
    public function edit(string $id)
    {
        $carusels = Carusels::findOrFail($id);
        return view('layout.admin.Carusels.edit', compact('carusels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carusels $carusels)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|max:1048576',
        ]);

        $old_image = $carusels->image;

        $data = $request->except('image');
        $new_img = $this->uploadImage($request);

        if ($new_img) {
            $data['image'] = $new_img;
        }

        $carusels->update($data);

        if ($old_image && $new_img) {
            Storage::disk('public')->delete($old_image);
        }

        // $carusels->update($request->all());
        return redirect()->route('carusels.index')
            ->with('success', 'Carusels updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carusels = Carusels::findOrFail($id);
        $carusels->delete();

        return redirect()->route('carusels.index')
            ->with('success', 'Carusels deleted successfully.');
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