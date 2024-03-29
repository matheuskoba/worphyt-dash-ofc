<?php

namespace App\Http\Controllers;

use App\Models\PersonalServices;
use App\Models\User;
use App\Models\PersonalPromotionalPacks;
use App\Models\PersonalSpecialty;
use App\Models\PersonalLanguage;
use App\Models\PersonalGym;
use App\Models\Personal;
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
        $user = auth()->user();
        $professionals = User::where('tipo', 0)->get();

        return view('inicio', compact('user', 'professionals'));
    }

    public function showPerfil()
    {
        $user = Auth()->user();

        $specialties = PersonalSpecialty::select()->where('id_personal', $user->id)->get();
        $languages = PersonalLanguage::select()->where('id_personal', $user->id)->get();
        $gyms = PersonalGym::select()->where('id_personal', $user->id)->get();
        $regions = PersonalServiceRegion::select()->where('id_personal', $user->id)->get();
        $packs = PersonalPromotionalPacks::select()->where('id_personal', $user->id)->get();

//            if ($user->cref === null) {
//                return redirect()->route('step1');
//            }

        if ($user) {
            return view('perfil', ['user' => $user, 'packs' => $packs, 'regions' => $regions, 'gyms' => $gyms, 'languages' => $languages, 'specialties' => $specialties]);
         }
    }
    public function deleteLanguage($id)
    {
        PersonalLanguage::where('id', $id)->delete();
        return redirect()->route('perfil');
    }
    public function deleteSpecialty($id)
    {
        PersonalSpecialty::where('id', $id)->delete();
        return redirect()->route('perfil');
    }
    public function deleteGym($id)
    {
        PersonalGym::where('id', $id)->delete();
        return redirect()->route('perfil');
    }
    public function deleteRegion($id)
    {
        PersonalServiceRegion::where('id', $id)->delete();
        return redirect()->route('perfil');
    }
    public function deletePack($id)
    {
        PersonalPromotionalPacks::where('id', $id)->delete();
        return redirect()->route('perfil');
    }
    public function addLanguage(Request $request)
    {
       $data = $request->all();

       $validator = Validator::make($data, [
           'language' => 'required'
       ]);

       if (!$validator->fails()) {
           $newlanguage = new PersonalLanguage();
           $newlanguage->id_personal = \Auth()->user()->id;
           $newlanguage->language = $data['language'];
           $newlanguage->save();

           return redirect()->route('perfil');
       }
       return redirect()->back()->withInput()->withErrors(['Preencha o campo']);
    }
    public function addSpecialty(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'specialty' => 'required'
        ]);

        if (!$validator->fails()) {
            $newspecialty = new PersonalSpecialty();
            $newspecialty->id_personal = \Auth()->user()->id;
            $newspecialty->specialty = $data['specialty'];
            $newspecialty->save();

            return redirect()->route('perfil');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha o campo']);
    }
    public function addGym(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'gym' => 'required'
        ]);

        if (!$validator->fails()) {
            $newgym = new PersonalGym();
            $newgym->id_personal = \Auth()->user()->id;
            $newgym->gym = $data['gym'];
            $newgym->save();

            return redirect()->route('perfil');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha o campo']);
    }
    public function addRegion(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'region' => 'required'
        ]);

        if (!$validator->fails()) {
            $newregion = new PersonalServiceRegion();
            $newregion->id_personal = \Auth()->user()->id;
            $newregion->region = $data['region'];
            $newregion->save();

            return redirect()->route('perfil');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha o campo']);
    }
    public function addPack(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'hour' => 'required',
            'price' => 'required'
        ]);

        if (!$validator->fails()) {
            $newpack = new PersonalPromotionalPacks();
            $newpack->id_personal = \Auth()->user()->id;
            $newpack->hours = $data['hour'];
            $newpack->pricepromotional = $data['price'];
            $newpack->save();

            return redirect()->route('perfil');
        }
        return redirect()->back()->withInput()->withErrors(['Preencha o campo']);
    }
    public function list()
    {
        $professionals = User::where('tipo', 0)->get();

        $user = auth()->user();

        return view('profesional.index', compact('user', 'professionals'));
    }
    public function filter(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();

        if($data['name'] && $user)
        {
            $professionals = User::where('tipo', 0)->where('name','LIKE','%'.$data['name'].'%')->get();
            if($professionals)
            {
                return view('profesional.index', compact('user', 'professionals'));
            }
        }
        else
        {
            return redirect()->back();
        }
    }
}


