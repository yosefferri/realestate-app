<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HouseController;


Route::post('registration', [AuthController::class, 'customRegistration']);
Route::post('signout', [AuthController::class, 'signOut']);

Route::post('auth/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['apiJWT']], function (){
    Route::get('/users/houses', [HouseController::class, 'userHouses']);
    Route::prefix('houses')->group(function () {
        Route::get('/', [HouseController::class, 'index']);
        Route::post('/', [HouseController::class, 'store']);
        Route::get('/{house}', [HouseController::class, 'show']);
        Route::put('/{house}', [HouseController::class, 'update']);
        Route::delete('/{house}', [HouseController::class, 'destroy']);
    });
});
