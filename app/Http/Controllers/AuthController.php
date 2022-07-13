<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = User::find(Auth()->user());

        if(Auth::check()){
            return view('dashboard', ['name' => $user[0]->name]);
        }

        return redirect()->route('auth');
    }
    public function authentication()
    {
       return view('auth', ['result' => '']);
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['Email e/ou senha estão incorretos']);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPassword' => 'required'
        ]);

        if(!$validator->fails()){
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');

            $emailExists = User::where('email', $email)->count();
            if($emailExists === 0){
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $newPersonal = new User();
                $newPersonal->name = $name;
                $newPersonal->email = $email;
                $newPersonal->password = $hash;
                $newPersonal->tipo = 0;
                $newPersonal->save();

                $token = Auth::attempt([
                    'email' => $email,
                    'password' => $password
                ]);

                if(!$token) {
                    return view('auth', ['result' => 'Falha ao gerar token de autenticação']);
                }
            }else{
                return view('auth', ['result' => 'Email já cadastrado']);
            }
        }else{
            return view('auth', ['result' => 'Dados incorretos']);
        }
        return view('dashboard');
    }
    public function logout()
    {
        Auth::logout();
        \Log::info("deslogou");
        return redirect()->route('auth');
    }
}
