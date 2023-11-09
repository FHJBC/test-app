<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     $token = $user->createToken('Personal Access Client')->accessToken;
        //     // $token = $user->getAuthIdentifier();

        //     return response()->json(['message' => 'Login successful', 'user' => $user, 'access_token' => $token], 200);
        // }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('Personal Access Client')->plainTextToken;

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login failed'], 401);
        }

        return response()->json(['message' => 'Login successful', 'user' => $user, 'access_token' => $token], 200);
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }
}
