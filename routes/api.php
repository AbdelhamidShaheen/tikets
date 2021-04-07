<?php

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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard',"dashboardController@Index");

    });

    Route::prefix('users')->group(function () {
        Route::middleware(['role:admin'])->group(function () {
            Route::get('/{id?}', "userController@list");
            Route::put('/{id}/edit', "userController@editUser");
        });
        Route::post('/signin', "userController@signIn")->withoutMiddleware(['auth:sanctum']);
        Route::post('/signup', "userController@signUp")->withoutMiddleware(['auth:sanctum']);
        Route::post('/verifymail/{token}', "userController@verifyEmail")->withoutMiddleware(['auth:sanctum']);
        Route::post('/resendactivationcode', "userController@resendActivationCode")->withoutMiddleware(['auth:sanctum']);
        Route::post('/auth', "userController@auth");
        Route::put('/updateprofile', "userController@updateProfile");
    });

    Route::prefix('tikets')->group(function () {
            Route::get('/{id?}', "tiketController@List");
           Route::middleware(['role:admin'])->group(function () {
            Route::post('/create', "tiketController@create");
            Route::put('{id}/edit', "tiketController@update");
            Route::delete('{id}/delete', "tiketController@delete");
        });

    });
});

Route::post('/email', "userController@sendm");

Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
