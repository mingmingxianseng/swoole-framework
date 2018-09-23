<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:27
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnWorkerStartInterface extends ListenerInterface
{
    /**
     * @param Server $server
     * @param int    $worker_id
     *
     */
    public function dispatch(Server $server, int $worker_id);
}