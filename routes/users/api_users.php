<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\users\usersController;
use App\Http\Controllers\users\rolesController;

Route::get('users', [usersController::class, 'index']);
Route::get('users/search', [usersController::class, 'search']);
Route::get('users/validarEmail', [usersController::class, 'validarUniqueUser']);
Route::get('users/validarUpdateEmail', [usersController::class, 'validarUniqueUpdateUser']);
Route::get('users/{id}', [usersController::class, 'show']);
Route::post('users', [usersController::class, 'create']);
Route::put('users/{id}', [usersController::class, 'update']);
Route::delete('users/{id}', [usersController::class, 'destroy']);

Route::get('roles', [rolesController::class, 'index']);
Route::get('roles/search', [rolesController::class, 'search']);
Route::get('roles/{id}', [rolesController::class, 'show']);