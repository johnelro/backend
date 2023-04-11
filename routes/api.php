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

Route::get('/user', [UserController::class, 'index']); //Show All From User table

Route::post('/user', [UserController::class, 'store'])->name('user.store');//Store Credintial to User table

Route::get('/user/{id}', [UserController::class, 'show']);//Show Specific User using ID

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');//update Credential of specific user using ID
Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password');


Route::delete('/user/{id}', [UserController::class, 'destroy']);//Delete User using ID

