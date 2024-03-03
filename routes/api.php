<?php

use App\Enums\LikeType;
use App\Http\Controllers\Api\LikeApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserApiController::class)->group(function () {
    Route::post('user/register', 'register');
    Route::post('user/login', 'login');
    Route::post('user/logout', 'logout');
});

Route::controller(PostApiController::class)->group(function () {
    Route::get('post/', 'index');
    Route::get('post/{username}/{slug}', 'show');
});

Route::controller(LikeApiController::class)->group(function () {
    Route::post('like/{type}', 'toggle')->whereIn('type', [LikeType::POST->value]);
});
