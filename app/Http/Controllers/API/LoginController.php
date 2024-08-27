<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if (auth('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('token')->plainTextToken;
            return Helper::sendSuccess('Login Successfully', [
                'token' => $token,
                'user' => $user
            ], 200);
        } else {
            return Helper::sendError('The provided credentials do not match our records.', [], 404);
        }
    }

    /**
     * Handle register request.
     */

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email', 
            'password' => 'required|string|min:6|confirmed',
        ]);

        // إنشاء مستخدم جديد
        $user = Admin::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        return Helper::sendSuccess('Registration Successful', [
            'token' => $token,
            'user' => $user
        ], 201);
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