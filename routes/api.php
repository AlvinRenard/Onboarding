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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('employee','App\Http\Controllers\EmployeeController@disp');
Route::post('employee','App\Http\Controllers\EmployeeController@create');
Route::put('/employee/{id}','App\Http\Controllers\EmployeeController@update');
Route::delete('/employee/{id}','App\Http\Controllers\EmployeeController@delete');
