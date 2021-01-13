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
Route::post('send/event', 'Socket\SocketController@sendEvent')->middleware('socket.required');

Route::get('/php/info', function (\Illuminate\Http\Request $request) {
    echo phpinfo();
});

Route::post('enviroment/check', 'Socket\SocketController@envCheck');

