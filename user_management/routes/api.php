<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Resources\UserResource;

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

use App\Http\Controllers\ApiController;

//Route::middleware('auth:sanctum')->group(function () {

//});

Route::get('/use', [ApiController::class, 'use']);
Route::post('/logout', [ApiController::class, 'logout']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/update-profile', [ApiController::class, 'updateProfile']);
Route::post('/delete-account', [ApiController::class, 'deleteAccount']);
