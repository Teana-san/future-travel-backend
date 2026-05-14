<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'phone' => $user->phone,
                    'email' => $user->email,
                    'role' => $user->role
                ]
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Los datos no coinciden con nuestros records'
        ], 401);
    }
}
