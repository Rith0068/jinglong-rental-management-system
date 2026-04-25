<?php

use App\Http\Controllers\DasboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TenantsController;
use App\Http\Controllers\BuildingController;

// Public page - Show all tenants
Route::get('/tenants', [TenantsController::class, 'index'])->name('tenants.index');

// Admin routes - Create tenant
Route::get('/admin/tenants/create', [TenantsController::class, 'create'])->name('tenants.create');
Route::post('/admin/tenants', [TenantsController::class, 'store'])->name('tenants.store');

Route::get('/building', [BuildingController::class, 'index'])->name('building.index');
Route::post('/building', [BuildingController::class, 'store'])->name('building.store');
Route::get('/buildings/{id}', [BuildingController::class, 'show'])->name('building.show');
Route::delete('/buildings/{id}', [BuildingController::class, 'destroy'])->name('building.destroy');

Route::get('/cart',[CartController::class, 'index']);

Route::get('/login',[LoginController::class , 'login']);

Route::get('/rent',[RentController::class , 'index']);

Route::get('/signup', [SignupController::class , 'index']);

Route::get('/dasboard', [DasboardController::class ,'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/property', [PropertyController::class , 'store'])->name('property.store');

Route::get('/property', [PropertyController::class , 'index']);