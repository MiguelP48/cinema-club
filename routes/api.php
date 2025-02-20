<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;



Route::apiResource('events', EventController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource(name: 'books', controller: BookController::class);
Route::apiResource('users', UserController::class);