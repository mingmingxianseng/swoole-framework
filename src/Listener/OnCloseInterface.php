<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:59
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnCloseInterface
{
    public function dispatch(Server $server, int $fd, int $reactorId);
}