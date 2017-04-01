<?php
/**
 * 后台路由配置
 * @author WeekTrip<weektrip@weektrip.cn>
 */
Route::get('/', [
    'as'    => 'backend.index.index',
    'uses'  => 'IndexController@index',
]);
Route::get('/index', [
   'uses'   => 'IndexController@index'
]);