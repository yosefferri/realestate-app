<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HouseController;
use App\Http\Resources\HouseResource;
use App\Http\Resources\UserResource;
use App\Models\House;
use App\Models\User;

Route::post('/login', [AdminController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::prefix('user')->group(function () {
   Route::post('/registration', [UserController::class, 'userRegistration'])->name('user-register');;   
});

Route::group(['prefix' => 'user','middleware' => ['assign.guard:apiJWT','jwt.auth']], function (){
        Route::put('/{house}', [HouseController::class, 'stor']);
        Route::get('/users/houses', [HouseController::class, 'userHouses']);
        Route::post('/register', [AdminController::class, 'adminRegistration']);
        Route::post('/', [UserController::class, 'index']);
        Route::get('/user/{id}', function ($id) {
            return new UserResource(User::findOrFail($id));});
        });
        
    

        Route::group([
            'prefix' => 'admin',
            'middleware' =>['assign.guard']], function(){
                        Route::get('index', function () {
                            return HouseResource::collection(House::all());
                        });
                        Route::post('logout', [AdminController::class, 'logout']);
                        Route::post('/store', [HouseController::class, 'store'])->name('request');
                        Route::get('/show/{id}', function ($id) {
                            return new HouseResource(House::findOrFail($id));
                        });
                        Route::put('/house/{id}', [HouseController::class, 'update']);
                        Route::delete('/house/{id}', [deleteHouse::class, 'deleted_at']);
                        }
    );