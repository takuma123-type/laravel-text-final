<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MealController;

Route::get('/',[MealController::class, 'index']);
Route::get('/meal',[MealController::class, 'index']);

Route::get('/meal/create',[MealController::class, 'create']);
Route::post('/meal/store',[MealController::class, 'store']);

Route::get('/meal/{date}/show',[MealController::class, 'show']);

Route::get('/meal/{date}/{meal_kind}/edit',[MealController::class, 'edit']);
Route::post('/meal/{id}/update',[MealController::class, 'update']);

Route::get('/meal/{id}/destroy',[MealController::class, 'destroy']);

Route::get('/meal/{date}/index',[MealController::class, 'index']);


