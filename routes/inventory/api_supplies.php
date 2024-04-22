<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\inventory\suppliesController;

Route::get('supplies', [suppliesController::class, 'index']);
Route::get('supplies/search', [suppliesController::class, 'search']);
Route::get('supplies/{id}', [suppliesController::class, 'show']);
