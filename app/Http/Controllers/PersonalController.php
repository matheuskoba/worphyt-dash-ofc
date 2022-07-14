<?php

namespace App\Http\Controllers;

use App\Models\PersonalServices;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function createService(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'nameservice' => 'required',
                'priceservice' => 'required',
                'descriptionservice' => 'required',
            ]);

            if (!$validator->fails()) {
                $nameservice = $request->input('nameservice');
                $priceservice = $request->input('priceservice');
                $descriptionservice = $request->input('descriptionservice');

                $user = User::find(Auth()->user());
                $idPersonal = $user[0]->id;

                $newService = new PersonalServices();
                $newService->name = $nameservice;
                $newService->price = $priceservice;
                $newService->description = $descriptionservice;
                $newService->id_personal = $idPersonal;
                $newService->save();

                return redirect()->route('dashboard');
            }
            return redirect()->back()->withInput()->withErrors(['Algo deu errado']);
        }
        return redirect()->route('auth', ['Errors' => 'Sessã́o encerrada, faça o login novamente']);
    }

    public function showServices()
    {
        if (Auth::check()) {
            $user = User::find(Auth()->user());
            $services = PersonalServices::select()->where('id_personal', $user[0]->id)->get();

            if ($services->isNotEmpty()) {
                return view('dashboard', ['services' => $services], ['name' => $user[0]->name]);
            } else {
                return view('dashboard', ['services' => null],['name' => $user[0]->name]);
            }
        }
        return view('auth');
    }
    public function deleteService($id)
    {
        if (Auth::check()) {
            $service = PersonalServices::where('id', $id)->delete();
            return redirect()->route('dashboard');
        }
        return redirect()->route('auth');
    }
}
