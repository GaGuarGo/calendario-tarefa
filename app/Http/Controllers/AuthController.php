<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request): void
    {

        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);



    }

    public function register(Request $request): void
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'confirm-password' => 'required|string|same:password',
        ]);
    }

    public function logout(Request $request): void
    {
    }
}
