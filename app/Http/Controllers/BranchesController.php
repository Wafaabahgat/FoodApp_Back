<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Country;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return view(
            'layout.admin.Branches.index',
            [
                'branches' => $branches
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Branch $branches)
    {
        $restaurant = Restaurant::all();
        $country = Country::all();

        return view(
            'layout.admin.Branches.create',
            compact('branches', 'restaurant', 'country')
        );
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

        return redirect()->route('branches.index')
            ->with('success', 'Branches created successfully.');
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
        $branches = Branch::findOrFail($id);
        $restaurant = Restaurant::all();
        $country = Country::all();
        return view('layout.admin.Branches.edit', compact('branches', 'restaurant', 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branches)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'restaurant_id' => 'required|exists:restaurants,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        $branches->update($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'Branch updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branches = Branch::findOrFail($id);
        $branches->delete();

        return redirect()->route('branches.index')
            ->with('success', 'Branch deleted successfully.');
    }
}