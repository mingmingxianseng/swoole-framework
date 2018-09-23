<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 10:58
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnWorkerErrorInterface extends ListenerInterface
{
    /**
     * @param Server $server
     * @param int    $worker_id  异常进程的编号
     * @param int    $worker_pid 异常进程的ID
     * @param int    $exit_code  退出的状态码，范围是 1 ～255
     * @param int    $signal     进程退出的信号
     *
     * @return void
     */
    public function dispatch(Server $server, int $worker_id, int $worker_pid, int $exit_code, int $signal): void;
}