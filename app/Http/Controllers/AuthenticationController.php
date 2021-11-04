<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
        ]);

        $userIdentifierType = filter_var($credentials['user'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$userIdentifierType => $credentials['user'], 'password', $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'auth' => 'Username/Email or Password failed to match',
        ]);
    }

    public function register(Request $request)
    {
        $userData = $request->validate([
            'username' => 'required|string|unique:users,name|min:4',
            'password' => 'required|string|min:8',
            'color' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

        $userData['password'] = Hash::make($userData['password']);

        $user = new User($userData);
        $user->save();

        Auth::login($user);

        return redirect()->intended();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
