<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = Country::all();
        return view(
            'layout.admin.Country.index',
            [
                'country' => $country
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Country $country)
    {
        return view(
            'layout.admin.Country.create',
            compact('country')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Country::create($request->all());

        return redirect()->route('country.index')
            ->with('success', 'Country created successfully.');
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
    public function edit(Country $country)
    {
        return view('layout.admin.Country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $country->update($request->all());
        return redirect()->route('country.index')
            ->with('success', 'Country updated successfully.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('country.index')
            ->with('success', 'Country deleted successfully.');
    }
}