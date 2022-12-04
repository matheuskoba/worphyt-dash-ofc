<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Models\User;

Route::get('/dashboard/auth', [AuthController::class, 'authentication'])->name('auth');

Route::prefix('/dashboard/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');
});

Route::prefix('/dashboard/register')->group(function () {
    Route::get('step1', function(){
        $user = User::find(\Auth()->user());
        return view('registersteps.registerstep1', ['user' => $user[0]]);
    })->name('step1');
    Route::post('step1', [RegisterController::class, 'personalinfo'])->name('personalinfo');

    Route::get('step2', function(){
        return view('registersteps.registerstep2');
    })->name('step2');
    Route::post('step2', [RegisterController::class, 'personalprofile'])->name('personalprofile');

    Route::get('step3', function(){
        return view('registersteps.registerstep3');
    })->name('step3');
    Route::post('step3', [RegisterController::class, 'personalprice'])->name('personalprice');

    Route::get('step4', function(){
        return view('registersteps.registerstep4');
    })->name('step4');
    Route::post('step4', [RegisterController::class, 'personalspecialties'])->name('personalspecialties');

    Route::get('step5', function(){
        return view('registersteps.registerstep5');
    })->name('step5');
    Route::post('step5', [RegisterController::class, 'personallanguages'])->name('personallanguages');

    Route::get('step6', function(){
        return view('registersteps.registerstep6');
    })->name('step6');
    Route::post('step6', [RegisterController::class, 'personalgyms'])->name('personalgyms');

    Route::get('step7', function(){
        return view('registersteps.registerstep7');
    })->name('step7');
    Route::post('step7', [RegisterController::class, 'personalregions'])->name('personalregions');
});

Route::prefix('/dashboard/perfil')->group(function () {
    Route::get('/', [PersonalController::class, 'showPerfil'])->name('perfil');
    Route::get('deletelanguage/{id}', [PersonalController::class, 'deleteLanguage'])->name('delete.language');
    Route::get('deletespecialty/{id}', [PersonalController::class, 'deleteSpecialty'])->name('delete.specialty');
    Route::get('deletegym/{id}', [PersonalController::class, 'deleteGym'])->name('delete.gym');
    Route::get('deleteregion/{id}', [PersonalController::class, 'deleteRegion'])->name('delete.region');
    Route::get('deletepack/{id}', [PersonalController::class, 'deletePack'])->name('delete.pack');
    Route::post('addlanguage', [PersonalController::class, 'addLanguage'])->name('add.language');
    Route::post('addspecialty', [PersonalController::class, 'addSpecialty'])->name('add.specialty');
    Route::post('addgym', [PersonalController::class, 'addGym'])->name('add.gym');
    Route::post('addregion', [PersonalController::class, 'addRegion'])->name('add.region');
    Route::post('addpack', [PersonalController::class, 'addPack'])->name('add.pack');
});

Route::prefix('/dashboard/professional')->group(function () {
    Route::get('list', [PersonalController::class, 'list'])->name('list.professional');
    Route::post('list/filter', [PersonalController::class, 'filter'])->name('professional.filter');
});

Route::get('/dashboard', [PersonalController::class, 'showAppointments'])->name('dashboard');

Route::get('/', [SiteController::class, 'site']);

//Route::get('/dashboard/authentication/emailverify', function(){
//    return view('verifyEmail');
//})->name('verification.email');
