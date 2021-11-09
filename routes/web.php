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
Route::get('/nokodeposisi', 'App\Http\Controllers\UserController@nokodeposisi');
Route::get('/success', 'App\Http\Controllers\InterviewControl@success');
Route::get('/login', 'App\Http\Controllers\UserController@loginindex');
Route::get('/userlanding/{id}', 'App\Http\Controllers\UserController@userlanding');
Route::get('/final/{id}', 'App\Http\Controllers\FileUploadController@final');
Route::get('/finalemplanding/{id}/{token?}', 'App\Http\Controllers\FileUploadController@finalemplanding');
Route::get('/Remuneration/{id}/{token?}', 'App\Http\Controllers\UserController@remuneration');
Route::get('/finalapprovalview/{id}/{token?}', 'App\Http\Controllers\UserController@finalapprovalview');

Route::get('/register', 'App\Http\Controllers\UserController@register');
Route::post('/registerPost', 'App\Http\Controllers\UserController@registerPost');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
Route::get('/databaseview', 'App\Http\Controllers\UserController@index');
Route::get('/onboarding/{id}/{token?}', 'App\Http\Controllers\UserController@show');
Route::get('/teamod/{id}/{token?}', 'App\Http\Controllers\UserController@showOd');
Route::get('/downloadfpk/{id}', 'App\Http\Controllers\DownloadController@downloadfpk');
Route::get('/downloadijazah/{id}', 'App\Http\Controllers\DownloadController@downloadijazah');
Route::get('/downloadcv/{id}', 'App\Http\Controllers\DownloadController@downloadcv');
Route::get('/downloadphoto/{id}', 'App\Http\Controllers\DownloadController@downloadphoto');
Route::post('/uploaddatabase1/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorecv');
Route::post('/uploaddatabase2/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorefpk');
Route::post('/uploaddatabase3/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStoreijazah');
Route::post('/uploaddatabase4/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorephoto');
Route::get('/sendemail/{id}/{token?}','App\Http\Controllers\EmailController@index');
Route::get('/sendemailod/{id}/{token?}','App\Http\Controllers\EmailController@odemail');
Route::get('/finalapproval1/{id}/{token?}','App\Http\Controllers\EmailController@finapproval1');
Route::get('/finalapproval2/{id}/{token?}','App\Http\Controllers\EmailController@finapproval2');
Route::get('/finalapproval3/{id}/{token?}','App\Http\Controllers\EmailController@finapproval3');
Route::get('/empemail/{id}/{token?}','App\Http\Controllers\EmailController@empemail');
Route::get('/empdetails/{id}/{token?}','App\Http\Controllers\UserController@empdetails');
Route::get('/accept/{id}', 'App\Http\Controllers\UserController@accept');
Route::get('/acceptfinal/{id}', 'App\Http\Controllers\UserController@acceptfinal');
Route::get('/reject/{id}', 'App\Http\Controllers\UserController@reject');
Route::get('/rejectfinal/{id}', 'App\Http\Controllers\UserController@reject');
Route::post('/kodeposisi/{id}', 'App\Http\Controllers\UserController@kode');
Route::get('/certif/{id}/{token?}', 'App\Http\Controllers\UserController@certif');
Route::get('/certif2/{id}/{token?}', 'App\Http\Controllers\UserController@certif2');
Route::get('/docs/{id}/{token?}', 'App\Http\Controllers\UserController@docs');
Route::get('/ticket', 'App\Http\Controllers\UserController@ticket');
Route::post('/loginPost', 'App\Http\Controllers\UserController@loginPost');
Route::group(['middleware' => 'userlog'], function () {
    Route::get('/home', 'App\Http\Controllers\UserController@index');
});