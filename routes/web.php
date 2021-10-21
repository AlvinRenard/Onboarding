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
Route::get('/dataexist', 'App\Http\Controllers\UserController@dataexist');
Route::get('process', 'App\Http\Controllers\InterviewControl@process');
Route::get('/employee/{nama}','App\Http\Controllers\InterviewControl@process');
Route::get('form','App\Http\Controllers\InterviewControl@form');
Route::post('form/interview','App\Http\Controllers\InterviewControl@interview');
Route::get('/form/interview/pegawai','App\Http\Controllers\InterviewControl@index');
Route::get('/home', 'App\Http\Controllers\UserController@index');
Route::get('/ticket', 'App\Http\Controllers\UserController@ticket');
Route::get('/home/about', 'App\Http\Controllers\InterviewControl@about');
Route::get('/home/contact', 'App\Http\Controllers\InterviewControl@contact');
Route::get('/home/add', 'App\Http\Controllers\InterviewControl@add');
Route::post('/home/dbinput', 'App\Http\Controllers\InterviewControl@store');
Route::get('/success', 'App\Http\Controllers\InterviewControl@success');
Route::get('/login', 'App\Http\Controllers\UserController@loginindex');
Route::get('/userlanding/{id}', 'App\Http\Controllers\UserController@userlanding');
Route::get('/final/{id}', 'App\Http\Controllers\FileUploadController@final');
Route::get('/Remuneration/{id}', 'App\Http\Controllers\UserController@remuneration');
Route::post('/loginPost', 'App\Http\Controllers\UserController@loginPost');
Route::get('/register', 'App\Http\Controllers\UserController@register');
Route::post('/registerPost', 'App\Http\Controllers\UserController@registerPost');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
Route::get('/databaseview', 'App\Http\Controllers\UserController@index');
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');
Route::get('/onboarding/{id}/{token?}', 'App\Http\Controllers\UserController@show');
Route::get('/downloadfpk/{id}', 'App\Http\Controllers\DownloadController@downloadfpk');
Route::get('/downloadijazah/{id}', 'App\Http\Controllers\DownloadController@downloadijazah');
Route::get('/downloadcv/{id}', 'App\Http\Controllers\DownloadController@downloadcv');
Route::get('/downloadphoto/{id}', 'App\Http\Controllers\DownloadController@downloadphoto');
Route::post('/uploaddatabase1/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorecv');
Route::post('/uploaddatabase2/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorefpk');
Route::post('/uploaddatabase3/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStoreijazah');
Route::post('/uploaddatabase4/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorephoto');
Route::get('/sendemail/{id}','App\Http\Controllers\EmailController@index');
Route::get('/empemail/{id}/{token?}','App\Http\Controllers\EmailController@empemail');
Route::get('/accept/{id}', 'App\Http\Controllers\UserController@accept');
Route::get('/reject/{id}', 'App\Http\Controllers\UserController@reject');
Route::middleware('auth:admin')->group(function(){
    // Tulis routemu di sini.
  });