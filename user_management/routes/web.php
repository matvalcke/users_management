<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', [ApiController::class, 'user']);
Route::post('/user', [ApiController::class, 'createUser']);
Route::get('/user/{idUtilisateur}', [ApiController::class, 'getUserById']);
Route::put('/user/{idUtilisateur}', [ApiController::class, 'updateUserById']);
Route::delete('/user/{idUtilisateur}', [ApiController::class, 'deleteUserById']); // nouvelle route pour la suppression d'un utilisateur

Route::post('/logout', [ApiController::class, 'logout']);
Route::get('/login', [ApiController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'regregisterApi'])
    ->middleware(\Illuminate\Routing\Middleware\ThrottleRequests::class);
Route::put('/update-profile', [ApiController::class, 'updateProfile']);
Route::post('/delete-account', [ApiController::class, 'deleteAccount']);
