<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:56
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnConnectInterface
{
    public function dispatch(Server $server, int $fd, int $reactorId);
}