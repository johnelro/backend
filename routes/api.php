<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\CarouselItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Carousel Routes
Route::get('/carousel', [CarouselItemsController::class, 'index']);

Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);

Route::post('/carousel', [CarouselItemsController::class, 'store']);

Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);

Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);

//User Routes

Route::get('/user', [UserController::class, 'index']);

Route::post('/user', [UserController::class, 'store']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);

