<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 10:00
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnBufferFullInterface
{
    public function dispatch(Server $server, int $fd);
}