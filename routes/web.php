<?php

use App\Http\Controllers\DasboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BuildingController;

Route::resource('building', BuildingController::class);
Route::get('/building', [BuildingController::class, 'index'])->name('building.index');
Route::post('/building', [BuildingController::class, 'store'])->name('building.store');
Route::get('/buildings/{id}', [BuildingController::class, 'show'])->name('building.show');
Route::delete('/buildings/{id}', [BuildingController::class, 'destroy'])->name('building.destroy');

Route::get('/cart',[CartController::class, 'index']);

Route::get('/login',[LoginController::class , 'login'])->name('login');

Route::get('/rent',[RentController::class , 'index']);

Route::get('/signup', [SignupController::class , 'index']);

Route::get('/dasboard', [DasboardController::class ,'index'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/property', [PropertyController::class , 'store'])->name('property.store');

Route::get('/property', [PropertyController::class , 'index']);

Route::get('/tenant', [TenantController::class , 'index']);

Route::get('/maintenances', [MaintenanceController::class , 'index']);