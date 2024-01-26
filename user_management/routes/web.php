<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/login', [ApiController::class, 'login']);
Route::get('/user/{idUtilisateur}', [ApiController::class, 'getUserById'])->middleware('jwt.verify');
Route::put('/user/{idUtilisateur}', [ApiController::class, 'updateUserById'])->middleware('jwt.verify');
Route::delete('/user/{idUtilisateur}', [ApiController::class, 'deleteUserById'])->middleware('jwt.verify');
Route::get('/user', [ApiController::class, 'user'])->middleware('jwt.verify');
Route::post('/user', [ApiController::class, 'createUser'])->middleware('jwt.verify');
Route::get('/logout', [ApiController::class, 'logout'])->middleware('jwt.verify');
Route::post('/verifyToken', [ApiController::class, 'verifyToken']);
