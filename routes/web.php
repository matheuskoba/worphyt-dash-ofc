<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/dashboard/authentication/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/dashboard/authentication/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/dashboard/authentication/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/dashboard/authentication/emailverify', function(){
    return view('verifyEmail');
})->name('verification.email');

Route::get('/dashboard/authentication/registerstep1', function(){
    $user = User::find(\Auth()->user());
    return view('registersteps.registerstep1', ['user' => $user[0]]);
})->name('step1');
Route::post('/dashboard/authentication/registerstep1/update1', [PersonalController::class, 'personalinfo'])->name('personalinfo');

Route::get('/dashboard/authentication/registerstep2', function(){
    return view('registersteps.registerstep2');
})->name('step2');
Route::post('/dashboard/authentication/registerstep2/update2', [PersonalController::class, 'personalprofile'])->name('personalprofile');

Route::get('/dashboard/authentication/registerstep3', function(){
    return view('registersteps.registerstep3');
})->name('step3');
Route::post('/dashboard/authentication/registerstep3/update3', [PersonalController::class, 'personalprice'])->name('personalprice');

Route::get('/dashboard/authentication/registerstep4', function(){
    return view('registersteps.registerstep4');
})->name('step4');
Route::post('/dashboard/authentication/registerstep4/update4', [PersonalController::class, 'personalspecialties'])->name('personalspecialties');

Route::get('/dashboard/authentication/registerstep5', function(){
    return view('registersteps.registerstep5');
})->name('step5');
Route::post('/dashboard/authentication/registerstep5/update5', [PersonalController::class, 'personallanguages'])->name('personallanguages');

Route::get('/dashboard/authentication/registerstep6', function(){
    return view('registersteps.registerstep6');
})->name('step6');
Route::post('/dashboard/authentication/registerstep6/update6', [PersonalController::class, 'personalgyms'])->name('personalgyms');

Route::get('/dashboard/authentication/registerstep7', function(){
    return view('registersteps.registerstep7');
})->name('step7');
Route::post('/dashboard/authentication/registerstep7/update7', [PersonalController::class, 'personalregions'])->name('personalregions');

Route::get('/dashboard/authentication', [AuthController::class, 'authentication'])->name('auth');
Route::get('/dashboard/perfil', [PersonalController::class, 'showPerfil'])->name('perfil');
Route::get('/dashboard/perfil/{id}', [PersonalController::class, 'deleteLanguage'])->name('delete.language');

Route::get('/dashboard', [PersonalController::class, 'showAppointments'])->name('dashboard');

Route::get('/', [SiteController::class, 'site']);
