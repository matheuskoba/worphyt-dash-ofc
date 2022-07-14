<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\AuthController;

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

Route::post('dashboard/authentication/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('dashboard/authentication/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('dashboard/authentication/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/dashboard/authentication', [AuthController::class, 'authentication'])->name('auth');
Route::get('/dashboard/agenda', [SiteController::class, 'agenda']);
Route::get('/dashboard/perfil', [SiteController::class, 'perfil']);

Route::post('/dashboard/createservice', [PersonalController::class, 'createService'])->name('createService');
Route::get('/dashboard', [PersonalController::class, 'showServices'])->name('dashboard');
Route::get('/dashboard/deleteservice/{id}', [PersonalController::class, 'deleteService'])->name('deleteService');


