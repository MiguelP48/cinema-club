<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;


Route::apiResource('events', EventController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource(name: 'movies', controller: MovieController::class);