<?php

use App\Http\Controllers\AuthController;
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

Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::prefix('auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/edit/{id}', [AuthController::class, 'update']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/userLogin', [AuthController::class, 'userProfile']);
        Route::get('/users', [AuthController::class, 'index']);
        Route::delete('/delete/{id}', [AuthController::class, 'destroy']);
        Route::get('search', [AuthController::class, 'search']);
    });

    Route::prefix('post')->group(function () {
        Route::post('add');
        Route::post('delete/{id}');
        Route::post('edit/{id}');
        Route::post('comment/{id}');
        Route::post('addComment');
    });


});
