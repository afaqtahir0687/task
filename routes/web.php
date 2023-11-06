<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', [App\Http\Controllers\UserController::class, 'create']);
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store']);
Route::get('userindex', [App\Http\Controllers\UserController::class, 'index']);


Route::get('/', [App\Http\Controllers\TaskController::class, 'create']);
Route::get('taskindex', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('task/store', [App\Http\Controllers\TaskController::class, 'store']);
