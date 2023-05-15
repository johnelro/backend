<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\CarouselItemsController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login',   'login')->name('user.login');
    Route::post('/logout',  'logout')->name('user.logout');
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CarouselItemsController::class)->group(function () {
    Route::get('/carousel',         'index');
    Route::get('/carousel/{id}',    'show');
    Route::post('/carousel',        'store');
    Route::put('/carousel/{id}',    'update');
    Route::delete('/carousel/{id}', 'destroy');
});


//User Routes

// Route::get('/user', [UserController::class, 'index']); //Show All From User table
// Route::post('/user', [UserController::class, 'store'])->name('user.store');//Store Credintial to User table
// Route::get('/user/{id}', [UserController::class, 'show']);//Show Specific User using ID

//Customized API path for Update

// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');//update Credential of specific user using ID
// Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
// Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password');
// Route::delete('/user/{id}', [UserController::class, 'destroy']);//Delete User using ID


//Messsages API
Route::get('/message', [MessagesController::class, 'index']);
Route::post('/message', [MessagesController::class, 'store']);
Route::delete('/message/{id}', [MessagesController::class, 'destroy']);



