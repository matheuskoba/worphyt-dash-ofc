<?php

namespace App\Http\Controllers;

use App\Models\PersonalServices;
use App\Models\User;
use App\Models\PersonalPromotionalPacks;
use App\Models\PersonalSpecialty;
use App\Models\PersonalLanguage;
use App\Models\PersonalGym;
use App\Models\PersonalServiceRegion;
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

//            if ($user[0]->cref === null) {
//                return redirect()->route('step1');
//            }

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

            $user = User::find(Auth()->user())->first();

            if ($user) {
                $user->whatsapp = $whatsapp;
                $user->instagram = $instagram;
                $user->cref = $cref;
                $user->save();

                return redirect()->route('step2');
            }
            return redirect()->back()->withInput()->withErrors(['Ocorreu um erro']);
        }
        return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
    }
    public function personalprofile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required'
        ]);

        if (!$validator->fails()) {
            $description = $request->textarea('description');

            $user = User::find(Auth()->user())->first();

            if ($user) {
                $user->description = $description;
                $user->save();

                return redirect()->route('step3');
            }
        }
        return redirect()->back()->withInput()->withErrors(['Preencha no mínimo um local']);
    }
    public function personalprice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'minorprice' => 'required',
            'majorprice' => 'required',
        ]);

        if (!$validator->fails()) {
            $minorprice = $request->input('minorprice');
            $majorprice = $request->input('majorprice');
            $hourclasses = $request->input('hourclass');
            $promotionalprices = $request->input('price');

            $user = User::find(Auth()->user())->first();
            if ($user) {
                $user->minorprice = $minorprice;
                $user->majorprice = $majorprice;
                $user->save();

                $arrays = array_combine($hourclasses, $promotionalprices);

                foreach ($arrays as $hourclass => $promotionalprice) {
                    if ($hourclass !== '' && $promotionalprice !== '') {
                        $newPersonalPacks = new PersonalPromotionalPacks();
                        $newPersonalPacks->id_personal = $user->id;
                        $newPersonalPacks->hours = $hourclass;
                        $newPersonalPacks->pricepromotional = $promotionalprice;
                        $newPersonalPacks->save();
                    }
                }
                return redirect()->route('step4');
            }
        }
        return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
    }
    public function personalspecialties(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'specialties' => 'required'
        ]);

        if (!$validator->fails()) {
            $specialties = $request->input('specialties');
            $trialtime = $request->input('trialtime');

            $user = User::find(Auth()->user())->first();
                if ($user) {
                    $user->trialtime = $trialtime;
                    $user->save();
                    foreach ($specialties as $specialty) {
                    if ($specialty) {
                        $newSpecialty = new PersonalSpecialty();
                        $newSpecialty->id_personal = $user->id;
                        $newSpecialty->specialty = $specialty;
                        $newSpecialty->save();
                    }
                }
            }
            return redirect()->route('step5');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha no mínimo uma especialidade']);
    }
    public function personallanguages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'languages' => 'required'
        ]);

        if (!$validator->fails()) {
            $languages = $request->input('languages');

            $user = User::find(Auth()->user())->first();
            foreach ($languages as $language) {
                if ($language) {
                    $newLanguage = new PersonalLanguage();
                    $newLanguage->id_personal = $user->id;
                    $newLanguage->language = $language;
                    $newLanguage->save();
                }
            }
            return redirect()->route('step6');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha no mínimo seu idioma nativo']);
    }
    public function personalgyms(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gyms' => 'required'
        ]);

        if (!$validator->fails()) {
            $gyms = $request->input('gyms');

            $user = User::find(Auth()->user())->first();
            foreach ($gyms as $gym){
                if ($gym) {
                    $newGym = new PersonalGym();
                    $newGym->id_personal = $user->id;
                    $newGym->gym = $gym;
                    $newGym->save();
                }
            }
            return redirect()->route('step7');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha no mínimo uma academia']);
    }
    public function personalregions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'regions' => 'required'
        ]);

        if (!$validator->fails()) {
            $regions = $request->input('regions');

            $user = User::find(Auth()->user())->first();
            foreach ($regions as $region) {
                if ($region) {
                    $newRegion = new PersonalServiceRegion();
                    $newRegion->id_personal = $user->id;
                    $newRegion->region = $region;
                    $newRegion->save();
                }
            }
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha no mínimo um local']);

    }
}


