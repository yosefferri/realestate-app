<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HouseController;
use App\Http\Resources\UserResource;
use App\Models\User;

Route::prefix('home')->group(function () {
    Route::post('/registration', [UserController::class, 'userRegistration'])->name('user-register');;
    
});
    



Route::group(['prefix' => 'user','middleware' => ['assign.guard:users','jwt.auth']], function (){
    Route::put('/{house}', [HouseController::class, 'buy']);
    Route::get('/users/houses', [HouseController::class, 'userHouses']);
    Route::post('/', [UserController::class, 'index']);
    Route::get('/user/{id}', function ($id) {
        return new UserResource(User::findOrFail($id));
    });
    Route::get('/logout', [UserController::class, 'logout']);
    });

    Route::group(['prefix' => 'admin','middleware' => ['assign.guard:admins','jwt.auth']], function () {
        Route::post('registration', [AdminController::class, 'adminRegistration']);
        Route::post('logout', [AdminController::class, 'logout']);
        Route::post('login', [AdminController::class, 'login']);
        Route::get('/index', [HouseController::class, 'index']);
        Route::post('/all', [HouseController::class, 'store']);
        Route::get('/house/{id}', [HouseController::class, 'show']);
        Route::put('/house/{id}', [HouseController::class, 'update']);
        Route::delete('/house/{id}', [deleteHouse::class, 'deleted_at']);
    });