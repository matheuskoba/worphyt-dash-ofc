<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\PersonalServices;

class PersonalController extends Controller
{
    public function showServices($id)
    {
        $array = ['error' => ''];

        $personal = Personal::where('id', $id)->first();

        $personal = Personal::all();
        $personal = Personal::find();

        if($personal)
        {
            $personal['services'] = [];

            $personal['services'] = PersonalServices::select(['id', 'name', 'price'])
                ->where('id_personal', $personal->id)
                ->get();

            $array['data']  = $personal;
        }
        return view('welcome', ['data',$array]);
    }
}
