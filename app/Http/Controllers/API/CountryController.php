<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $country = Country::paginate(2);
        return Helper::sendSuccess('', $country);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Country::create($request->all());
        return Helper::sendSuccess('Country created successfully', '', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return Helper::sendError('Country not found', [], 404);
        }

        return Helper::sendSuccess('', $country);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $country = Country::find($id);
        if (!$country) {  
            return Helper::sendError('Country not found', [], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country->update($validated);
        return Helper::sendSuccess('Country updated successfully', '', 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return Helper::sendError('Country not found', [], 404);
        }

        $country->delete();
        return Helper::sendSuccess('Country deleted successfully', '', 201);
    }
}