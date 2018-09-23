<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:53
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnWorkerStopInterface extends ListenerInterface
{
    public function dispatch(Server $server, int $worker_id);
}