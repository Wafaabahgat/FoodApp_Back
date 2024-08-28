<?php

namespace App\Http\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;

class Helper
{
    function getImageUrl($path)
    {
        return url('storage/' . $path);
    }
}