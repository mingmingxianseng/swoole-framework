<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:57
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnReceiveInterface
{
    public function dispatch(Server $server, int $fd, int $reactor_id, string $data);
}