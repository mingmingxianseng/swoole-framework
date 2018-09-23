<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 10:54
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnFinishInterface extends ListenerInterface
{
    /**
     * 当worker进程投递的任务在task_worker中完成时，task进程会通过swoole_server->finish()方法将任务处理的结果发送给worker进程。
     *
     * @param Server $server
     * @param int    $task_id 任务的ID
     * @param string $data    任务处理的结果内容
     *
     * @return void
     */
    public function dispatch(Server $server, int $task_id, string $data): void;
}