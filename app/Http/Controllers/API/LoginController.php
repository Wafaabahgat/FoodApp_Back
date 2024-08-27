<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // dd(auth('admin')->attempt($credentials));

        if (auth('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('token')->plainTextToken;
             return Helper::sendSuccess('Login Successfully', [
                 'token' => $token,
                 'user' => $user
             ], 200);

            // return response()->json([
            //     'token' => $token,
            //     'user' => $user
            // ], 200);
        } else {
            return Helper::sendError('The provided credentials do not match our records.', [], 404);
        }
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully.'], 200);
    }
}