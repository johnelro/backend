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

Route::get('/user', [UserController::class, 'index']); //SHpw All From table

Route::post('/user', [UserController::class, 'store']);//Store Credintial from Use 

Route::get('/user/{id}', [UserController::class, 'show']);//Show Specific User

Route::put('/user/{id}', [UserController::class, 'update']);//update Credential of specific user

Route::delete('/user/{id}', [UserController::class, 'destroy']);//Delete Credential from User

