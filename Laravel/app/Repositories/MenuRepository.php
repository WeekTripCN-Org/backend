<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Cache;
use PhpParser\Node\Stmt\Case_;

/**
 * Class MenuRepository
 *
 * @package \App\Repositories
 *
 * @author  WeekTrip<weektrip@weektrip.cn>
 */
class MenuRepository extends CommonRepository
{
    // 所有菜单缓存
    const ALL_MENUS_CACHE = 'all_menus_cache';

    // 所有顶级显示菜单缓存
    const ALL_TOP_MENUS_CACHE = 'all_top_meus_cache';

    // 所有显示菜单缓存
    const ALL_DISPLAY_MENUS_CACHE = 'all_display_meus_array_cache';

    /**
     * 获取所有菜单
     * @return mixed
     */
    public function getAllMenusLists()
    {
        $menus = Cache::get(self::ALL_MENUS_CACHE);
        if (empty($menus)) {
            $menus = $this->model->all();
            Cache::forever(self::ALL_MENUS_CACHE, $menus);
            return $menus;
        } else {
            return $menus;
        }
    }

    /**
     * 获取所有显示菜单
     * @return mixed
     */
    public function getAllDisplayMenus()
    {
        $menus = Cache::get(self::ALL_DISPLAY_MENUS_CACHE);
        if (empty($menus)) {
            $menus = $this->model->whereHide(0)->orderBy('sort', 'asc')->get()->toArray();
            Cache::forever(self::ALL_DISPLAY_MENUS_CACHE, $menus);
            return $menus;
        } else {
            return $menus;
        }
    }

    public function getAllTopMenus()
    {
        $menus = Cache::get(self::ALL_TOP_MENUS_CACHE);
        if (empty($menus)) {
            $menu[''] = '所有菜单';
            $menus = $this->model->whereHide(0)->whereParentId(0)->orderBy('sort', 'desc')->lists('name', 'id')->toArray();
            $menus = $menu + $menus;
            Cache::forever(self::ALL_TOP_MENUS_CACHE, $menus);
            return $menus;
        } else {
            return $menus;
        }
    }

    public function getChildMenusById($id)
    {
        return $this->model->where('parent_id', '=', $id)->get()->toArray();
    }

    public function clearCache()
    {
        Cache::forget(self::ALL_MENUS_CACHE);
        Cache::forget(self::ALL_TOP_MENUS_CACHE);
        Cache::forget(self::ALL_DISPLAY_MENUS_CACHE);
    }
}