<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MessagesController;
use App\Http\Controllers\Api\ProfileController;
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


//Public API
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user',[UserController::class, 'store'])->name('user.store');


// Private APIs
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin APIs
    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel',             'index');
        Route::get('/carousel/{id}',        'show');
        Route::post('/carousel',            'store');
        Route::put('/carousel/{id}',        'update');
        Route::delete('/carousel/{id}',     'destroy');
    });
    Route::controller(UserController::class)->group(function () {
        // User Routes
        Route::get('/user','index'); 
        Route::get('/user/{id}','show');

        // Customized API path for Update
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::put('/user/image/{id}',      'image')->name('user.image');
        Route::delete('/user/{id}',         'destroy');
    });

    Route::controller(MessagesController::class)->group(function () {
        // Messsages API
        Route::get('/message',              'index');
        Route::post('/message',             'store');
        Route::delete('/message/{id}',      'destroy');
    });

    // User specific APIs
    Route::get('/profile/show',       [ProfileController::class, 'show']);
    Route::put('/profile/image',      [ProfileController::class, 'image'])->name('profile.image');
});





