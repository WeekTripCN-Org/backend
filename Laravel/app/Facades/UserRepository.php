<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * Class UserRepository
 *
 * @package \App\Facades
 *
 * @author  WeekTrip<weektrip@weektrip.cn>
 */
class UserRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'userrepository';
        //parent::getFacadeAccessor(); // TODO: Change the autogenerated stub
    }
}