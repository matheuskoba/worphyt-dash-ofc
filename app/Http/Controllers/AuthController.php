<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function authentication()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
       return view('auth');
    }
    public function login(AuthRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {

            if (Auth::attempt($validated)) { //<- this if fail with personal model, but it work with default user model
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'email' => 'Email e/ou senha incorretos',
            ])->onlyInput('email');
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth');
    }
}
