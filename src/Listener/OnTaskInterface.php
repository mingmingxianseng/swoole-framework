<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 10:52
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnTaskInterface extends ListenerInterface
{
    /**
     * @param Server $server
     * @param int    $task_id       任务ID，由swoole扩展内自动生成，用于区分不同的任务。$task_id和$src_worker_id组合起来才是全局唯一的，不同的worker进程投递的任务ID可能会有相同
     * @param int    $src_worker_id 来自于哪个worker进程
     * @param mixed  $data          任务的内容
     *
     * @return mixed
     */
    public function dispatch(Server $server, int $task_id, int $src_worker_id, $data);
}