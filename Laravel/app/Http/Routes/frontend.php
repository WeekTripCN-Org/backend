<?php
/**
 * 前端路由配置
 * @author WeekTrip<weektrip@weektrip.cn>
 */
Route::get('/', [
    'as'    => 'frontend/index.index',
    'uses'  => 'IndexController@index',
]);