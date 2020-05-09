<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('questions', 'QuestionAPIController')->only([
    'index', 'show'
]);



Route::resource('devices', 'DeviceAPIController')->only([
    'index', 'show', 'store'
]);

Route::get('getUID/{uid}', 'DeviceAPIController@getUID');



Route::resource('reports', 'ReportAPIController')->only([
    'store'
]);


Route::post('contact', 'NotificationController@sendEmail');

Route::get('countReports', 'ReportAPIController@countReports');