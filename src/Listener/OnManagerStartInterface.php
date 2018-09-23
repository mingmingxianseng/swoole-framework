<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:00
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnManagerStartInterface extends ListenerInterface
{
    /**
     * 当管理进程启动时调用它  在这个回调函数中可以修改管理进程的名称。 swoole_set_process_name
     * @param Server $server
     *
     * @return void
     */
    public function dispatch(Server $server):void;
}