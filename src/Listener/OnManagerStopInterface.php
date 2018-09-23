<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:02
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnManagerStopInterface extends ListenerInterface
{
    /**
     * 当管理进程结束时调用它
     *
     * @param Server $server
     */
    public function dispatch(Server $server): void;
}