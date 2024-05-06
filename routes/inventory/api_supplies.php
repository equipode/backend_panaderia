<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\inventory\suppliesController;
use App\Http\Controllers\inventory\productsController;
use App\Http\Controllers\production_cost\workerController;
use App\Http\Controllers\production_cost\billsController;

Route::get('workers', [workerController::class, 'index']);

Route::get('bills', [billsController::class, 'index']);

Route::get('supplies', [suppliesController::class, 'index']);
Route::get('supplies/search', [suppliesController::class, 'search']);
Route::get('supplies/{id}', [suppliesController::class, 'show']);

Route::get('products', [productsController::class, 'index']);
Route::post('products', [productsController::class, 'create']);