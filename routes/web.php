<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Web;

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

Route::get('/register', [Web\AuthController::class, 'register'])->name('register');
Route::get('/login', [Web\AuthController::class, 'login'])->name('login');

Route::get('/', [Web\HomeController::class, 'index'])->name('home');
