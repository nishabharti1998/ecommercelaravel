<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/users','User@insert');
Route::post('/checklogin','User@login_check');
 //Route::middleware('test')->post('/admin','User@user_details');
Route::post('/product','product@insert_data')->middleware('test');
Route::get('/view','product@view');
Route::get('/userview','product@userview');