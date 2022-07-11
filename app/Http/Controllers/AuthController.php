<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(Request $request)
    {
        return view('auth');
    }
}
