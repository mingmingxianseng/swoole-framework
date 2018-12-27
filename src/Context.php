<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/27
 * Time: 11:23
 */

namespace MMC\Swoole;

use Swoole\Coroutine;

class Context
{
    protected static $pool = [];

    /**
     * @param $key
     *
     * @return null
     */
    static function get($key)
    {
        $cid = Coroutine::getuid();
        if ($cid < 0) {
            return null;
        }
        if (isset(self::$pool[$cid][$key])) {
            return self::$pool[$cid][$key];
        }

        return null;
    }

    /**
     * @param $key
     * @param $item
     */
    static function set($key, $item)
    {
        $cid = Coroutine::getuid();
        if ($cid > 0) {
            self::$pool[$cid][$key] = $item;
        }
    }

    /**
     * 清空某一个协程的全局变量
     */
    static function clear()
    {
        $cid = Coroutine::getuid();
        if ($cid > 0) {
            unset(self::$pool[$cid]);
        }
    }
}