<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController; 
use App\Http\Controllers\API\UserController; 
use App\Http\Controllers\API\CityController; 

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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::resource('cities', CityController::class);
    Route::controller(CityController::class)->group(function(){
        Route::post('cities/{id}/update_city_picture', 'updateCityPicture');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'getUser');
        Route::post('user/upload_avatar', 'uploadAvatar');
        Route::delete('user/remove_avatar', 'removeAvatar');
        Route::post('user/send_verification_email', 'sendVerificationEmail');
        Route::post('user/change_email', 'changeEmail');
    });
});

