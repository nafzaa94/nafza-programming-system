<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Video/detail/{id}', [ApiController::class, 'ApiVideoId']);

Route::get('Video/{categories}', [ApiController::class, 'ApiVideoAll']);

Route::get('datastory', [ApiController::class, 'Datastory']);

Route::get('datapostdiscussionfyp', [ApiController::class, 'Datapostdiscussionfyp']);

Route::get("comment", [ApiController::class, 'ApiComment']);

Route::get('ProfileUsers', [ApiController::class, 'ApiProfileUsers']);

Route::get('Users', [ApiController::class, 'ApiUsers']);

Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);
