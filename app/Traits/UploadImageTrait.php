<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImageTrait
{
    public function uploadImage(Request $request, $folder)
    {
        if (!$request->hasFile('image')) {
            return null; // أو يمكنك إرجاع رسالة خطأ أو قيمة افتراضية حسب الحاجة
        }

        $file = $request->file('image'); //uploadFile object
        $path = $file->store($folder, 'public'); // تخزين الصورة في المجلد المحدد
        return $path;
    }
}