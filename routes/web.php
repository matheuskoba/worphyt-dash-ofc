<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;

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
    return view('registersteps.registerstep1');
});
Route::get('/dashboard/authentication/registerstep2', function(){
    return view('registersteps.registerstep2');
});
Route::get('/dashboard/authentication/registerstep3', function(){
    return view('registersteps.registerstep3');
});
Route::post('/dashboard/authentication/registerstep3/save', [PersonalController::class, 'personalprice'])->name('personalprice');

Route::get('/dashboard/authentication/registerstep4', function(){
    return view('registersteps.registerstep4');
});
Route::get('/dashboard/authentication/registerstep5', function(){
    return view('registersteps.registerstep5');
});
Route::get('/dashboard/authentication/registerstep6', function(){
    return view('registersteps.registerstep6');
});
Route::get('/dashboard/authentication/registerstep7', function(){
    return view('registersteps.registerstep7');
});

Route::get('/dashboard/authentication', [AuthController::class, 'authentication'])->name('auth');
Route::get('/dashboard/agenda', [PersonalController::class, 'showSchedule']);
Route::get('/dashboard/perfil', [PersonalController::class, 'showPerfil']);

Route::post('/dashboard/createservice', [PersonalController::class, 'createService'])->name('createService');
Route::get('/dashboard', [PersonalController::class, 'showServices'])->name('dashboard');
Route::get('/dashboard/deleteservice/{id}', [PersonalController::class, 'deleteService'])->name('deleteService');
Route::post('/dashboard/updateservice/{id}', [PersonalController::class, 'updateService'])->name('updateservice');


Route::get('/', [SiteController::class, 'site']);

