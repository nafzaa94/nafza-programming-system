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

Route::get('GetAllUser', [ApiController::class, 'GetAllUser']);

Route::get('Video/detail/{id}', [ApiController::class, 'ApiVideoId']);

Route::post('Video/categories', [ApiController::class, 'ApiVideoAll']);

Route::get('datastory', [ApiController::class, 'Datastory']);

Route::get('datapostdiscussionfyp', [ApiController::class, 'Datapostdiscussionfyp']);

Route::get("comment", [ApiController::class, 'ApiComment']);

Route::get('ProfileUsers', [ApiController::class, 'ApiProfileUsers']);

Route::post('ProfileUser/detail', [ApiController::class, 'ApiProfileUserDetail']);

Route::post('User', [ApiController::class, 'User']);

Route::post('register', [UserController::class, 'register']);

Route::post('login', [UserController::class, 'login']);

Route::post('ProfileUser/Create', [ApiController::class, 'CreateProfileUser']);

Route::post('ProjectUser/Create', [ApiController::class, 'CreateProjectUser']);

Route::post('UpdatePackage', [ApiController::class, 'UpdatePackage']);

Route::post('discussionfyp/comment', [ApiController::class, 'CreateCommentPostDiscussionFyp']);

Route::post('commentdiscussionfyp', [ApiController::class, 'CommentPostDiscussionFyp']);

Route::post('callbackdatacommentdiscussionfyp', [ApiController::class, 'CallbackDataCommentPostDiscussionFyp']);

Route::post('updatecommentdiscussionfyp', [ApiController::class, 'UpdateCommentPostDiscussionFyp']);

Route::post('deletecommentdiscussionfyp', [ApiController::class, 'DeleteCommentPostDiscussionFyp']);

Route::post('createreplydiscussionfyp', [ApiController::class, 'CreateReplyPostDiscussionFyp']);

Route::get('replydiscussionfyp', [ApiController::class, 'ReplyPostDiscussionFyp']);
