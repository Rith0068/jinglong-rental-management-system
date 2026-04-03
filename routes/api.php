<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UnitController;

Route::get('/lease',[LeaseController::class, 'index']);

Route::get('/maintenance',[MaintenanceController::class, 'index']);

Route::get('/payment',[PaymentController::class, 'index']);

Route::get('/property',[PropertyController::class, 'index']);

Route::get('/tenant',[TenantController::class, 'index']);

Route::get('/unit',[UnitController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
