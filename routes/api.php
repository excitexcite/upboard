<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});

Route::get('/users', [Controllers\UserController::class, 'all']);
Route::post('/users', [Controllers\UserController::class, 'create']);
Route::post('/users/login', [Controllers\UserController::class, 'login']);
Route::post('/users/register', [Controllers\UserController::class, 'register']);

Route::post('/projects', [Controllers\ProjectController::class, 'create']);
Route::get('/projects', [Controllers\ProjectController::class, 'all']);
Route::get('/projects/{project}/tasks', [Controllers\ProjectController::class, 'projectTasks']);
Route::post('/projects/{project}/tasks', [Controllers\ProjectController::class, 'addTask']);

Route::patch('/tasks/{task}', [Controllers\ProjectController::class, 'updateTask']);
