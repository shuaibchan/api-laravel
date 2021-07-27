<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'registration']);
Route::post('/login', [UserController::class , 'login']);
Route::middleware('auth:api')->put('/updateuser', [UserController::class , 'updateuser']);
Route::middleware('auth:api')->get('/products', [ProductController::class , 'index']);
Route::middleware('auth:api')->get('/products/{id}', [ProductController::class , 'show']);
Route::middleware('auth:api')->any('/products/store', [ProductController::class , 'store']);
Route::middleware('auth:api')->post('/products/update/{id}', [ProductController::class , 'update']);
Route::middleware('auth:api')->get('/products/delete/{id}', [ProductController::class , 'destroy']);




