<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (RateLimiter::tooManyAttempts($request->username, 5)) {
            return response()->json([
                'message' => 'Demasiados intentos fallidos. Inténtalo de nuevo en 1 minuto.',
            ], 429);
        }

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            RateLimiter::clear($request->username);

            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'user' => $user,
            ], 200);
        }

        RateLimiter::hit($request->username, 60);

        return response()->json([
            'message' => 'Las credenciales no coinciden con nuestros registros.',
        ], 401);
    }
}
