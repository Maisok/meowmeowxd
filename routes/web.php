<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::resource('users', UserController::class);


Route::get('users/index',[UserController::class, 'index']);

Route::post('users/create',[UserController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});