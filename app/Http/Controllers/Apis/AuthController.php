<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /* Agrega a un nuevo usuario */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email',
            'password'          => 'required|string|min:8|max:255',
        ]);

        $user = User::create([
            'name'              => $validatedData['name'],
            'email'             => $validatedData['email'],
            'password'          => Hash::make($validatedData['password']),
        ]);

        $user->roles()->attach(3);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    /* Valida los datos del usuario para entrar al sistema */
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

    /* Obtiene la información de un usuario */
    public function infoUser(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'rol'  => $request->user()->roles,
        ]);
        /* return response()->json([
            'user' => Auth::user(),
            'rol'  => Auth::user()->roles,
        ]); */
    }
}
