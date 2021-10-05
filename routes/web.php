<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('process', 'App\Http\Controllers\InterviewControl@process');
Route::get('/employee/{nama}','App\Http\Controllers\InterviewControl@process');
Route::get('form','App\Http\Controllers\InterviewControl@form');
Route::post('form/interview','App\Http\Controllers\InterviewControl@interview');
Route::get('/form/interview/pegawai','App\Http\Controllers\InterviewControl@index');
Route::get('/home', 'App\Http\Controllers\UserController@index');
Route::get('/home/about', 'App\Http\Controllers\InterviewControl@about');
Route::get('/home/contact', 'App\Http\Controllers\InterviewControl@contact');
Route::get('/home/add', 'App\Http\Controllers\InterviewControl@add');
Route::post('/home/dbinput', 'App\Http\Controllers\InterviewControl@store');
Route::get('/success', 'App\Http\Controllers\InterviewControl@success');
Route::get('/login', 'App\Http\Controllers\UserController@login');
Route::post('/loginPost', 'App\Http\Controllers\UserController@loginPost');
Route::get('/register', 'App\Http\Controllers\UserController@register');
Route::post('/registerPost', 'App\Http\Controllers\UserController@registerPost');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
