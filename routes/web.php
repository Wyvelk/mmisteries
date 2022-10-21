<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

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

Route::get('/login', [FirstController::class, 'login']);
Route::post('/loginT', [FirstController::class, 'loginT']);

Route::get('/register', [FirstController::class, 'register']);
Route::post('/registerT', [FirstController::class, 'registerT']);
Route::get('/accueil', [FirstController::class, 'accueil']);

Route::get('/contact', [FirstController::class, 'contact']);
