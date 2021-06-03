<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [Web\HomeController::class, 'index'])->name('home');

Route::get('/register', [Web\AuthController::class, 'register'])->middleware('guest')->name('register');
Route::get('/login', [Web\AuthController::class, 'login'])->middleware('guest')->name('login');

Route::get('/projects/new', [Web\ProjectController::class, 'create'])->name('new-project');
Route::get('/{username}/{project}', [Web\ProjectController::class, 'board']);

