<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','UserController@index');
Route::get('/login','LoginController@login');
Route::any('/selfreport','ReportController@selfreport');
Route::any('/green','ReportController@green');
Route::any('/arrive','ReportController@arrive');
Route::any('/delay','ReportController@delay');
Route::any('/mustknow','DataController@mustknow');
Route::any('/notice','DataController@notice');
Route::any('/data','DataController@data');
Route::any('/ask','DataController@ask');
Route::any('/usercenter','UserController@usercenter');
Route::any('/entrance','UserController@entrance');
Route::any('/userinfo','UserController@userinfo');
Route::any('/dormbook','UserController@dormbook');
Route::any('/reportcard','UserController@reportcard');
Route::any('/changepsw','UserController@changepsw');
Route::any('/routes','UserController@routes');
Route::any('/commonquestion','DataController@commonquestion');
Route::any('/answer','DataController@answer');
Route::any('/tiwen','DataController@tiwen');
Route::any('/myanswer','DataController@myanswer');
Route::any('/uploaDate','DataController@uploaDate');
Route::any('/myuploaDate','DataController@myuploaDate');






/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
