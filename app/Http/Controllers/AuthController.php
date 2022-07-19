<?php

namespace App\Http\Controllers;

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
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $user = User::find(Auth()->user());

            if ($user[0]->cref != null) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('cref');
            }
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
            $confirmPassword = $request->input('confirmPassword');

            if ($password != $confirmPassword) {
                return redirect()->back()->withInput()->withErrors(['As senhas precisam ser iguais']);
            }

            $emailExists = User::where('email', $email)->count();
            if($emailExists === 0){
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $newPersonal = new User();
                $newPersonal->name = $name;
                $newPersonal->email = $email;
                $newPersonal->password = $hash;
                $newPersonal->tipo = 0;
                $newPersonal->save();

                event(new Registered($newPersonal));

                $user = User::find(Auth()->user());

                $token = Auth::attempt([
                    'email' => $email,
                    'password' => $password
                ]);

                if(!$token) {
                    return redirect()->back()->withInput()->withErrors(['Falha na autenticacao']);
                }
            }else{
                return redirect()->back()->withInput()->withErrors(['Este email ja foi cadastrado']);
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['Dados incorretos']);
        }
        return redirect()->route('cref');
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth');
    }
}
