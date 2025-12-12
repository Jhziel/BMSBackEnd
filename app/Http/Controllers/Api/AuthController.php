<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new User
     */
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create($validatedData);
        $token = $user->createToken($user->name);

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ], 201);
    }

    /**
     * Logging In a User
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return [
                'message' => 'The credentials do not match'
            ];
        }

        $token = $user->createToken($user->name);

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken
        ], 200);
    }

    /**
     * Logging out a User
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->noContent();
    }
}
