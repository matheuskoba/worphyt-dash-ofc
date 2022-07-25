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

            if ($user[0]->cref === null) {
                return redirect()->route('step1');
            }

            if ($services->isNotEmpty()) {
                return view('dashboard', ['services' => $services], ['user' => $user[0]]);
            } else {
                return view('dashboard', ['services' => null],['user' => $user[0]]);
            }
        }
        return redirect()->route('auth');
    }
    public function updateService(Request $request, $id)
    {
        if (Auth::check()) {
            $servicename = $request->input('servicename');
            $serviceprice = $request->input('serviceprice');
            $servicedescription = $request->input('servicedescription');

            $service = PersonalServices::find($request->id);

            if ($servicename)  {
                $service->name = $servicename;
            }

            if ($serviceprice) {
                $service->price = $serviceprice;
            }

            if ($servicedescription) {
                $service->description = $servicedescription;
            }

            $service->save();

            return redirect()->route('dashboard');
        }
        return redirect()->route('auth');
    }
    public function deleteService($id)
    {
        if (Auth::check()) {
            $service = PersonalServices::where('id', $id)->delete();
            return redirect()->route('dashboard');
        }
        return redirect()->route('auth');
    }
    public function showPerfil()
    {
        if (Auth::check()) {
            $user = User::find(Auth()->user());

            if ($user[0]->cref === null) {
                return redirect()->route('step1');
            }

            if ($user) {
                return view('perfil', ['user' => $user[0]]);
            }
        }
        return redirect()->route('auth');
    }
    public function showSchedule()
    {
        if (Auth::check()) {
            $user = User::find(Auth()->user());

            if ($user) {
                return view('agenda', ['user' => $user[0]]);
            }
        }
        return redirect()->route('auth');
    }
    public function personalinfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'whatsapp' => 'required',
            'instagram' => 'required',
            'cref' => 'required',
        ]);

        if (!$validator->fails()) {
            $whatsapp = $request->input('whatsapp');
            $instagram = $request->input('instagram');
            $cref = $request->input('cref');

            $user = User::find(Auth()->user());

            if ($user) {
                $user->whatsapp = $whatsapp;
                $user->instagram = $instagram;
                $user->cref = $cref;
                $user->save();

                return redirect()->route('step2');
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
        }
    }
    public function personalprofile(Request $request)
    {
        var_dump($request->all());
    }
    public function personalprice(Request $request)
    {
        var_dump($request->all());
    }
    public function personalspecialties(Request $request)
    {
        var_dump($request->all());
    }
    public function personallanguages(Request $request)
    {
        var_dump($request->all());
    }
    public function personalgyms(Request $request)
    {
        var_dump($request->all());
    }
    public function personalregions(Request $request)
    {
        var_dump($request->all());
    }
}


