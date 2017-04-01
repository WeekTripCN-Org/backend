<?php
/**
 * 登录和注册认证
 * @author WeekTrip<weektrip@weektrip.cn>
 */
Route::get('auth/login', 'AuthController@getLogin');
Route::post('auth/login', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@getLogout');

Route::get('auth/register', 'AuthController@getRegister');
Route::post('auth/register', 'AuthController@postRegister');
