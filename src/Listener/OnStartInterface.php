<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:48
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnStartInterface extends ListenerInterface
{
    public function dispatch(Server $server);
}