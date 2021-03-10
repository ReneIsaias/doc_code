<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|string|max:255',
            'apellidos'         => 'required|string|max:255',
            'fechanacimiento'   => 'required|date',
            'telefono'          => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email',
            'password'          => 'required|string|min:8|max:255',
        ]);

        $user = User::create([
            'name'              => $validatedData['name'],
            'apellidos'         => $validatedData['apellidos'],
            'fechanacimiento'   => $validatedData['fechanacimiento'],
            'telefono'          => $validatedData['telefono'],
            'email'             => $validatedData['email'],
            'password'          => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function infoUser(Request $request)
    {
        return $request->user(); 
    }
}