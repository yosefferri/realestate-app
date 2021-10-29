<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HouseController;
use App\Http\Resources\UserResource;
use App\Models\User;

Route::prefix('guest')->group(function () {
    Route::post('/registration', [UserController::class, 'userRegistration'])->name('user-register');;
    Route::post('/signout', [UserController::class, 'signOut']);
});
    



Route::group(['prefix' => 'user','middleware' => ['assign.guard:users','jwt.auth']], function (){
//    Route::prefix('users')->group(function(){
    Route::put('/{house}', [HouseController::class, 'buy']);
    Route::get('/users/houses', [HouseController::class, 'userHouses']);
    Route::post('/', [UserController::class, 'index']);
    Route::get('/user/{id}', function ($id) {
        return new UserResource(User::findOrFail($id));
    });
    });
//});


    Route::group(['prefix' => 'admin','middleware' => ['assign.guard:admins','jwt.auth']], function () {
        Route::post('registration', [AdminController::class, 'adminRegistration']);
        Route::post('signout', [AdminController::class, 'signOut']);
        Route::post('login', [AdminController::class, 'login']);
        Route::get('/', [HouseController::class, 'index']);
        Route::post('/all', [HouseController::class, 'store']);
        Route::get('/{house}', [HouseController::class, 'show']);
        Route::put('/{house}', [HouseController::class, 'update']);
        Route::delete('/{house}', [deleteHouse::class, 'deleted_at']);
    });