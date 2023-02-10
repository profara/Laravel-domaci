<?php

use App\Http\Controllers\AdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('ads', AdController::class);