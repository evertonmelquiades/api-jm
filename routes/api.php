<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('businesses', BusinessController::class);

require __DIR__.'/auth.php';
