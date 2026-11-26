<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// CRUD REST API Media
Route::apiResource('media', MediaController::class);

// Custom Action Relasi User & Koleksi Media
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users/{user}/collection', [UserController::class, 'addToCollection']);
Route::delete('/users/{user}/collection/{mediaId}', [UserController::class, 'removeFromCollection']);
