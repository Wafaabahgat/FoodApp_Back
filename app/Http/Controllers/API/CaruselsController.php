<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carusels;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;

class CaruselsController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carusels = Carusels::all();
        return Helper::sendSuccess('', $carusels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'image' => 'image|max:1048576|required',
        ]);

        $path = $this->uploadImage($request, 'carusels');

        Carusels::create([
            'name' => $request->input('name'), // تأكد من إدراج الاسم
            'image' => $path
        ]);

        return Helper::sendSuccess('Carusels created successfully', [], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $carusels = Carusels::find($id);
        if (!$carusels) {
            return Helper::sendError('Carusels not found', [], 404);
        }
        return Helper::sendSuccess('', $carusels);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $carusels = Carusels::find($id);
        if (!$carusels) {
            return Helper::sendError('Carusels not found', [], 404);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'image' => 'image|max:1048576|nullable',
        ]);

        // تحقق من الصورة إذا كانت موجودة
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request, 'carusels');
            $validated['image'] = $path;
        }

        $carusels->update($validated);

        return Helper::sendSuccess('Carusels updated successfully', $carusels, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carusels = Carusels::find($id);
        if (!$carusels) {
            return Helper::sendError('Carusels not found', [], 404);
        }

        // حذف الصورة من التخزين إذا لزم الأمر
        if ($carusels->image) {
            Storage::disk('public')->delete($carusels->image);
        }

        $carusels->delete();

        return Helper::sendSuccess('Carusels deleted successfully', '', 201);
    }
}