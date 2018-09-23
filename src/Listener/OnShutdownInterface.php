<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:51
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnShutdownInterface extends ListenerInterface
{
    public function dispatch(Server $server);
}