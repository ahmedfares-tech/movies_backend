<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieCommentController;
use App\Http\Controllers\MovieController;

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

Route::prefix('v1')->group(function () {
    Route::get('/category', [CategoryController::class, 'index']);
});
//register new user
Route::post('/create-account', [AuthenticationController::class, 'createAccount']);
//login user
Route::post('/signin', [AuthenticationController::class, 'signin']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('movies', MovieController::class);
    Route::post('comment/{id}', [MovieCommentController::class, 'store']);
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('/sign-out', [AuthenticationController::class, 'logout']);
});
