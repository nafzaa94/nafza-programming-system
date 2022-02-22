<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentDiscussionCPController;
use App\Http\Controllers\CommentDiscussionFypController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\DiscussioncpController;
use App\Http\Controllers\GithubDataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderProjectController;
use App\Http\Controllers\PostDiscussionFypController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\ReplyDiscussionFypController;
use App\Http\Controllers\VideoController;
use App\Http\Livewire\Discussioncp;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/community', [CommunityController::class, 'index'])->name('community');

Route::get('/video', [VideoController::class, 'index'])->name('video');

Route::post('/storeprofile/{id}', [ProfileUserController::class, 'store'])->name('storeprofile');

Route::get('/profile/{id}', [ProfileUserController::class, 'index'])->name('profile');

Route::get('/profileproject/{id}', [ProfileUserController::class, 'indexproject'])->name('profileproject');

Route::get('/profilegithublink/{id}', [ProfileUserController::class, 'indexgithublink'])->name('profilegithublink');

Route::post('/profilegithublink/set/{id}', [GithubDataController::class, 'store'])->name('profilegithublinkset');

Route::post('/detailprofile/uploadimage/{id}', [ProfileUserController::class, 'uploadimageprofile']);

Route::post('/detailproject/uploadimage/{id}', [ProfileUserController::class, 'uploadimageproject']);

Route::get('/orderproject/page', [OrderProjectController::class, 'index'])->name('orderproject');

Route::post('/orderproject/comfirm/{id}', [OrderProjectController::class, 'store']);

Route::post('/orderproject/halfpayment/{id}', [OrderProjectController::class, 'halfpayment']);

Route::post('/orderproject/fullpayment/{id}', [OrderProjectController::class, 'fullpayment']);

Route::get('/orderproject/purchases/{id}', [OrderProjectController::class, 'show']);

Route::post('/orderproject/submit/{id}', [OrderProjectController::class, 'submit']);

Route::get('/mypayment/{id}', [OrderProjectController::class, 'mypayment'])->name('mypayment');

Route::get('/community/discussionfyp/{id}', [PostDiscussionFypController::class, 'index']);

Route::post('/community/discussionfyp/{id}', [PostDiscussionFypController::class, 'store']);

Route::post('/community/postdiscussionfyp/editpost/{key}', [PostDiscussionFypController::class, 'update']);

Route::delete('/community/postdiscussionfyp/delete/{id}', [PostDiscussionFypController::class, 'destroy']);

Route::get('/community/discussionfyp/detail/{key}', [CommentDiscussionFypController::class, 'index']);

Route::post('/community/discussionfyp/comments/{id}', [CommentDiscussionFypController::class, 'store']);

Route::post('/community/discussionfyp/comments/edit/{key}', [CommentDiscussionFypController::class, 'update']);

Route::delete('/community/discussionfyp/comments/delete/{id}', [CommentDiscussionFypController::class, 'destroy']);

Route::post('/community/discussionfyp/reply/{key}/{id}', [ReplyDiscussionFypController::class, 'store']);

Route::get('/community/discussioncp/{id}', [DiscussioncpController::class, 'index']);

Route::post('/community/discussioncp/{id}', [DiscussioncpController::class, 'store']);

Route::get('/community/discussioncp/detail/{key}', [CommentDiscussionCPController::class, 'index']);
