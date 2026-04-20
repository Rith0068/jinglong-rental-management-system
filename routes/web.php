<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentController;

Route::get('/login',[LoginController::class , 'login']);

Route::get('/rent',[RentController::class , 'index']);

Route::get('/', function () {
    return view('welcome');
});
