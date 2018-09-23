<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 10:49
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnBufferEmptyInterface extends ListenerInterface
{
    public function dispatch(Server $server, int $fd);
}