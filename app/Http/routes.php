<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'Home\IndexController@Indexa');
Route::get('/cate/{cate_id}', 'Home\IndexController@Cate');
Route::get('/article/{art_id}', 'Home\IndexController@Article');

Route::any('user/login', 'User\LoginController@Login');
Route::any('user/register', 'User\IndexController@Register');
Route::any('admin/login', 'Admin\LoginController@Login');
Route::get('user/code', 'User\LoginController@Code');


Route::group(['middleware' => ['user.login'],'prefix' => 'user','namespace' => 'User'],function(){
    Route::get('/', 'IndexController@Index');
    Route::get('info', 'IndexController@Info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');
    Route::post('changeuserkey', 'IndexController@ChangeUserKey');

    Route::any('device/refresh', 'DeviceController@Refresh');
    Route::post('device/changeorder', 'DeviceController@Changeorder');
    Route::resource('device', 'DeviceController');

    Route::any('type/refresh', 'TypeController@Refresh');
    Route::post('type/changeorder', 'TypeController@Changeorder');
    Route::resource('type', 'TypeController');
});

Route::group(['middleware' => ['admin.login'],'prefix' => 'admin','namespace' => 'Admin'],function(){
    Route::get('/', 'IndexController@Index');
    Route::get('info', 'IndexController@Info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::post('cate/changeorder', 'CategoryController@Changeorder');
    Route::resource('category', 'CategoryController');

    Route::post('type/changeorder', 'TypeController@Changeorder');
    Route::resource('type', 'TypeController');

    Route::post('dev/changeorder', 'DeviceController@Changeorder');
    Route::resource('device', 'DeviceController');

    Route::any('upload', 'ArticleController@Upload');
    Route::resource('article', 'ArticleController');

    Route::post('custom/changeorder', 'CustomController@Changeorder');
    Route::resource('custom', 'CustomController');

    Route::post('navs/changeorder', 'NavsController@Changeorder');
    Route::resource('navs', 'NavsController');

    Route::get('config/putfile', 'ConfigController@PutFile');
    Route::post('config/changeorder', 'ConfigController@Changeorder');
    Route::post('config/changecontent', 'ConfigController@Changecontent');
    Route::resource('config', 'ConfigController');

});
