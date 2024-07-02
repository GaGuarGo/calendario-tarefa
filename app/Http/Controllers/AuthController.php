<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            return back()->with('success', 'Login Feito Com Sucesso');
        }

        return back()->with('error', 'Credencias Inválidas');

    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'confirm-password' => 'required|string|same:password',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, false)) {
            return back()->with('success', 'Cadastro Feito Com Sucesso');
        }

        return back()->with('error', 'Erro ao Efetuar Cadastro');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Você foi Desconectado!');
    }
}
