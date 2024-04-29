<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\inventory\suppliesController;
use App\Http\Controllers\inventory\productsController;
use App\Http\Controllers\production_cost\workerController;

Route::get('workers', [workerController::class, 'index']);

Route::get('supplies', [suppliesController::class, 'index']);
Route::get('supplies/search', [suppliesController::class, 'search']);
Route::get('supplies/{id}', [suppliesController::class, 'show']);

Route::post('products', [productsController::class, 'create']);