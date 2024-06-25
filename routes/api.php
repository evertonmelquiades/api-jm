<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::post('/login', [UserController::class, 'login'])
    ->middleware('web')
    ->name('login');
Route::post('/logout', [UserController::class, 'logout'])->middleware('web')->name('logout');
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('businesses', BusinessController::class);

require __DIR__ . '/auth.php';
