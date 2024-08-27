<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carusels;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadImageTrait;

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

        $path = $this->uploadImg($request, 'carusels');

        carusels::create([
            'image' => $path
        ]);

        // // تخزين الصورة
        // $path = $request->file('image')->store('uploads', 'public');

        // // إنشاء كائن Carusels مع مسار الصورة
        // $carusels = Carusels::create([
        //     'name' => $request->name,
        //     'image' => $path,
        // ]);

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
            'image' => 'image|max:1048576|nullable', // اجعلها غير إلزامية لتحديث بدون صورة
        ]);

        $old_path = $carusels->image;
        $path = $this->uploadImg($request, 'carusels');

        $carusels->update([
            'image' => $path ?? $old_path
        ]);

        if ($old_path && isset($path)) {
            Storage::disk('public')->delete($old_path);
        }

        // $carusels->update($validated);

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

        $carusels->delete();

        if ($carusels->image) {
            Storage::disk('public')->delete($carusels->image);
        }

        return Helper::sendSuccess('Carusels deleted successfully', '', 201);
    }
}