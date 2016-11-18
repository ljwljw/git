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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('jiekou','JiekouController@jiekou');
Route::get('images','JiekouController@images');
Route::get('news','JiekouController@news');
Route::get('desc','JiekouController@desc');
Route::get('delay','JiekouController@delay');
Route::get('dormbook','JiekouController@dormbook');
Route::get('arrive','JiekouController@arrive');
Route::get('userinfo','JiekouController@userinfo');
Route::get('green','JiekouController@green');
Route::get('commonquestion','JiekouController@commonquestion');
Route::get('tiwen','JiekouController@tiwen');
Route::get('myanswer','JiekouController@myanswer');
Route::get('uploaDate','JiekouController@uploaDate');
Route::get('myuploaDate','JiekouController@myuploaDate');
Route::get('login','JiekouController@login');
Route::get('change','JiekouController@change');
Route::get('answer','JiekouController@answer');
Route::get('pinglun','JiekouController@pinglun');
Route::get('reportcard','JiekouController@reportcard');












//Route::any('/jiekou','JiekouController@jiekou');

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
