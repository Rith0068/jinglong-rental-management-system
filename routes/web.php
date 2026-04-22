<?php

use App\Http\Controllers\DasboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PropertyController;

Route::get('/login',[LoginController::class , 'login']);

Route::get('/rent',[RentController::class , 'index']);

Route::get('/signup', [SignupController::class , 'index']);

Route::get('/dasboard', [DasboardController::class ,'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/property', [PropertyController::class , 'store'])->name('property.store');

Route::get('/property', [PropertyController::class , 'index']);