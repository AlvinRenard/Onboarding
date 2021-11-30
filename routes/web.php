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

Route::get('/userlanding/{id}/{token?}', 'App\Http\Controllers\UserController@userlanding');
Route::get('/final/{id}', 'App\Http\Controllers\FileUploadController@final');
Route::get('/finalemplanding/{id}/{token?}', 'App\Http\Controllers\FileUploadController@finalemplanding');
Route::get('/Remuneration/{id}/{token?}', 'App\Http\Controllers\UserController@remuneration');
Route::get('/finalapprovalview/{id}/{token?}', 'App\Http\Controllers\UserController@finalapprovalview');
Route::get('/financeapprovalroute/{id}/{token?}', 'App\Http\Controllers\UserController@financeapprovalroute');
Route::get('/register', 'App\Http\Controllers\UserController@register');
Route::post('/registerPost', 'App\Http\Controllers\UserController@registerPost');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
Route::get('/databaseview', 'App\Http\Controllers\UserController@index');
Route::get('/onboarding/{id}/{token?}', 'App\Http\Controllers\UserController@show');
Route::get('/teamod/{id}/{token?}', 'App\Http\Controllers\UserController@showOd');
Route::get('/downloadfpk/{id}/{token?}', 'App\Http\Controllers\DownloadController@downloadfpk');
Route::get('/downloadijazah/{id}/{token?}', 'App\Http\Controllers\DownloadController@downloadijazah');
Route::get('/downloadcv/{id}/{token?}', 'App\Http\Controllers\DownloadController@downloadcv');
Route::get('/downloadphoto/{id}/{token?}', 'App\Http\Controllers\DownloadController@downloadphoto');
Route::post('/empinformation/{id}/{token?}', 'App\Http\Controllers\FileUploadController@empinformation');
Route::post('/empinformationupdate/{id}/{token?}', 'App\Http\Controllers\FileUploadController@empinformationupdate');
Route::post('/uploaddatabase1/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorecv');
Route::post('/uploaddatabase2/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorefpk');
Route::post('/uploaddatabase3/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStoreijazah');
Route::post('/uploaddatabase4/{id}/{token?}', 'App\Http\Controllers\FileUploadController@fileStorephoto');
Route::post('/uploaddate/{id}/{token?}', 'App\Http\Controllers\UserController@uploaddate');
Route::get('/sendemail/{id}/{token?}','App\Http\Controllers\EmailController@index');
Route::get('/sendemailod/{id}/{token?}','App\Http\Controllers\EmailController@odemail');
Route::get('/finalapproval1/{id}/{token?}','App\Http\Controllers\EmailController@finapproval1');
Route::get('/finalapproval2/{id}/{token?}','App\Http\Controllers\EmailController@finapproval2');
Route::get('/finalapproval3/{id}/{token?}','App\Http\Controllers\EmailController@finapproval3');
Route::get('/financeapproval/{id}/{token?}','App\Http\Controllers\EmailController@financeapproval');
Route::get('/empemail/{id}/{token?}','App\Http\Controllers\EmailController@empemail');
Route::get('/empdetails/{id}/{token?}','App\Http\Controllers\UserController@empdetails');
Route::get('/complete/{id}/{token?}','App\Http\Controllers\UserController@complete');
Route::get('/contractemail/{id}/{token?}','App\Http\Controllers\UserController@contractemail');
Route::get('/empcontractemail/{id}/{token?}','App\Http\Controllers\EmailController@empcontractemail');
Route::get('/accept/{id}/{token?}', 'App\Http\Controllers\UserController@accept');
Route::get('/datetime/{id}/{token?}', 'App\Http\Controllers\UserController@datetime');
Route::get('/acceptfinal/{id}/{token?}', 'App\Http\Controllers\UserController@acceptfinal');
Route::get('/acceptfinancefinal/{id}/{token?}', 'App\Http\Controllers\UserController@acceptfinancefinal');
Route::get('/rejectlanding/{id}/{token}', 'App\Http\Controllers\UserController@rejectlanding');
Route::get('/reject/{id}/{token}', 'App\Http\Controllers\UserController@reject');
Route::get('/rejectfinallanding/{id}/{token?}', 'App\Http\Controllers\UserController@rejectfinallanding');
Route::get('/rejectfinal/{id}/{token?}', 'App\Http\Controllers\UserController@rejectfinal');
Route::get('/rejectfinancelanding/{id}/{token}', 'App\Http\Controllers\UserController@rejectfinancelanding');
Route::get('/rejectfinance/{id}/{token}', 'App\Http\Controllers\UserController@rejectfinance');
Route::get('/reset/{id}/{token?}', 'App\Http\Controllers\UserController@reset');
Route::post('/kodeposisi/{id}/{token?}', 'App\Http\Controllers\UserController@kode');
Route::get('/certif/{id}/{token?}', 'App\Http\Controllers\UserController@certif');
Route::get('/idcard/{id}/{token?}', 'App\Http\Controllers\UserController@idcard');
Route::get('/certif2/{id}/{token?}', 'App\Http\Controllers\UserController@certif2');
Route::get('/docs/{id}/{token?}', 'App\Http\Controllers\UserController@docs');
Route::get('/filenotcomplete/{id}/{token?}', 'App\Http\Controllers\UserController@filenotcomplete');
Route::get('/deleteuser/{id}', 'App\Http\Controllers\UserController@deleteuser');
Route::get('/edituser/{id}', 'App\Http\Controllers\UserController@edituser');
Route::post('/edituserPost/{id}', 'App\Http\Controllers\UserController@edituserPost');
Route::post('/loginPost', 'App\Http\Controllers\UserController@loginPost');
Route::get('/login', 'App\Http\Controllers\UserController@loginindex');
Route::group(['middleware' => 'adminlog'], function () {
    Route::get('/adminpage', 'App\Http\Controllers\UserController@adminpage');

});
Route::group(['middleware' => ['hrlog']], function () {
    Route::get('/home', 'App\Http\Controllers\UserController@index');

});
Route::group(['middleware' => ['remunerationlog']], function () {
    Route::get('/ticket', 'App\Http\Controllers\UserController@ticket');

});
