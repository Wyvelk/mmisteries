<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MissionController;
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

Route::get('/', [FirstController::class, 'start']);

Route::get('/accueil', [FirstController::class, 'accueil']);
Route::get('/adventure', [FirstController::class, 'adventure']);
Route::get('/equipe', [FirstController::class, 'equipe']);
Route::get('/journal', [FirstController::class, 'journal']);
Route::get('/mission/{id}', [MissionController::class, 'mission'])-> where('id', '[0-9]+');
Route::get('/abandon/{id}', [MissionController::class, 'abandon'])-> where('id', '[0-9]+');
Route::get('/aide/{id}', [MissionController::class, 'aide'])-> where('id', '[0-9]+');
Route::post('/valider/{id}', [MissionController::class, 'valider'])-> where('id', '[0-9]+');

Route::get('classement', [FirstController::class, 'classement']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/contact',[FirstController::class,'contact']);
