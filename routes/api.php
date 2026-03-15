<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerSearchController;

Route::get('/customers/search', [CustomerSearchController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function ($request) {
    return $request->user();
});