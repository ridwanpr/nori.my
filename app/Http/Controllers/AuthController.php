<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLoginPage(): View
    {
        return view('auth.login');
    }

    public function getRegisterPage(): View
    {
        return view('auth.register');
    }

    public function postRegister(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:8|confirmed',
            'cf-turnstile-response' => app()->environment('production') ? ['required', Rule::turnstile()] : [],
        ]);

        unset($validated['cf-turnstile-response']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => Role::USER,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration Success!');
    }

    public function postLogin(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'cf-turnstile-response' => app()->environment('production') ? ['required', Rule::turnstile()] : [],
        ]);

        unset($credentials['cf-turnstile-response']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login Success!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout Success!');
    }
}
