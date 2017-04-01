<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

/**
 * Class ActionRepository
 *
 * @package \App\Facades
 *
 * @author  WeekTrip<weektrip@weektrip.cn>
 */
class ActionRepository extends  Facade
{
    protected static function getFacadeAccessor()
    {
        return 'actionrepository';
    }
}