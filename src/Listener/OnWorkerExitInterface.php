<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:54
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnWorkerExitInterface extends ListenerInterface
{
    public function dispatch(Server $server, int $worker_id);
}