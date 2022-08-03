<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationSteps\RegisterStep1Request;
use App\Http\Requests\RegistrationSteps\RegisterStep2Request;
use App\Http\Requests\RegistrationSteps\RegisterStep3Request;
use App\Http\Requests\RegistrationSteps\RegisterStep4Request;
use App\Http\Requests\RegistrationSteps\RegisterStep5Request;
use App\Http\Requests\RegistrationSteps\RegisterStep6Request;
use App\Http\Requests\RegistrationSteps\RegisterStep7Request;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

use App\Models\PersonalGym;
use App\Models\PersonalLanguage;
use App\Models\PersonalPromotionalPacks;
use App\Models\PersonalServiceRegion;
use App\Models\PersonalSpecialty;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = $request->all();

            if ($data['password'] != $data['confirmPassword']) {
                return redirect()->back()->withInput()->withErrors(['As senhas precisam ser iguais']);
            }

            $emailExists = User::where('email', $data['email'])->count();

            if($emailExists === 0){
                $hash = password_hash($data['password'], PASSWORD_DEFAULT);

                $newPersonal = new User();
                $newPersonal->name = $data['name'];
                $newPersonal->email = $data['email'];
                $newPersonal->password = $hash;
                $newPersonal->tipo = 0;
                $newPersonal->save();

//                event(new Registered($newPersonal));

                $user = User::find(Auth()->user());

                $token = Auth::attempt([
                    'email' => $data['email'],
                    'password' => $data['password']
                ]);

                if(!$token) {
                    return redirect()->back()->withInput()->withErrors(['Falha na autenticacao']);
                }

                return redirect()->route('step1');
            }else{
                return redirect()->back()->withInput()->withErrors(['Este email ja foi cadastrado']);
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['Dados incorretos']);
        }
    }
    public function personalinfo(RegisterStep1Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = $request->all();

            $user = User::find(Auth()->user())->first();

            if ($user) {
                $user->whatsapp = $data['whatsapp'];
                $user->instagram = $data['instragram'];
                $user->cref = $data['cref'];
                $user->save();

                return redirect()->route('step2');
            }
            return redirect()->back()->withInput()->withErrors(['Ocorreu um erro']);
        }
        return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
    }
    public function personalprofile(RegisterStep2Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $description = $request->input('description');
//            $avatar = $request->file('image');

            $user = User::find(Auth()->user())->first();

            if ($user) {
//                $imageName = time().'.'.$avatar->getClientOriginalExtension();
//                $avatar->move(public_path('images'), $imageName);
//                $user->avatar = $imageName;
                $user->description = $description;
                $user->save();

                return redirect()->route('step3');
            }
            return redirect()->back()->withInput()->withErrors(['teste']);
        }
        return redirect()->back()->withInput()->withErrors(['A imagem precisa ser menor ou igual a 1024px']);
    }
    public function personalprice(RegisterStep3Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = $request->all();

            $user = User::find(Auth()->user())->first();
            if ($user) {
                $user->minorprice = $data['minorprice'];
                $user->majorprice = $data['majorprice'];
                $user->save();

                if ($data['hourclasses'] && $data['promotionalprices']) {
                    $arrays = array_combine($data['hourclasses'] , $data['promotionalprices']);

                    foreach ($arrays as $hourclass => $promotionalprice) {
                        if ($hourclass !== '' && $promotionalprice !== '') {
                            $newPersonalPacks = new PersonalPromotionalPacks();
                            $newPersonalPacks->id_personal = $user->id;
                            $newPersonalPacks->hours = $hourclass;
                            $newPersonalPacks->pricepromotional = $promotionalprice;
                            $newPersonalPacks->save();
                        }
                    }
                }
                return redirect()->route('step4');
            }
        }
        return redirect()->back()->withInput()->withErrors(['Preencha todos os campos']);
    }
    public function personalspecialties(RegisterStep4Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = $request->all();

            $user = User::find(Auth()->user())->first();
            if ($user) {
                $user->trialtime = $data['trialtime'];
                $user->save();
                foreach ($data['specialties'] as $specialty) {
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
    public function personallanguages(RegisterStep5Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = $request->all();
            $remote = (!isset($data['remote'])) ? 0 : 1;
            $presential = (!isset($data['presential'])) ? 0 : 1;

            $user = User::find(Auth()->user())->first();

            if ($user) {
                if ($remote) {
                    $user->remote_service = $remote;
                }
                if($presential) {
                    $user->face_to_face_service = $presential;
                }
                $user->save();
            }

            if ($data['languages']) {
                foreach ($data['languages'] as $language) {
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
    public function personalgyms(RegisterStep6Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
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
    public function personalregions(RegisterStep7Request $request)
    {
        $validated = $request->validated();

        if ($validated) {
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
