<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/ads/{id}', [AdController::class, 'show']);

// Route::get('/ads', [AdController::class, 'index']);

Route::post('/ads', [AdController::class, 'store']);
Route::delete('/ads/{id}', [AdController::class, 'destroy']);
Route::patch('/ads/{id}', [AdController::class, 'update']);




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('ads', AdController::class)->only(['update', 'store', 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('ads', AdController::class)->only(['index']);