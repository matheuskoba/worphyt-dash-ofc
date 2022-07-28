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

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showAppointments()
    {
        $user = User::find(\Auth()->user());
        return view('inicio', ['user' => $user[0]]);
    }
    public function showPerfil()
    {
        $user = User::find(Auth()->user());
        $specialties = PersonalSpecialty::select()->where('id_personal', $user[0]->id)->get();
        $languages = PersonalLanguage::select()->where('id_personal', $user[0]->id)->get();
        $gyms = PersonalGym::select()->where('id_personal', $user[0]->id)->get();
        $regions = PersonalServiceRegion::select()->where('id_personal', $user[0]->id)->get();
        $packs = PersonalPromotionalPacks::select()->where('id_personal', $user[0]->id)->get();
        \Log::info($packs);

//            if ($user[0]->cref === null) {
//                return redirect()->route('step1');
//            }

        if ($user) {
            return view('perfil', ['user' => $user[0], 'packs' => $packs, 'regions' => $regions, 'gyms' => $gyms, 'languages' => $languages, 'specialties' => $specialties]);
         }
    }
    public function deleteLanguage($id)
    {
        $language = PersonalLanguage::where('id', $id)->delete();
        return redirect()->route('perfil');
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

                if ($hourclasses && $promotionalprices) {
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
            $data = $request->all();
            $languages = $data['language'];
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

            if ($languages) {
                foreach ($languages as $language) {
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


