<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 10:56
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnPipMessageInterface extends ListenerInterface
{
    /**
     * @param Server $server
     * @param int    $src_worker_id 消息来自哪个Worker进程
     * @param mixed  $message 消息内容，可以是任意PHP类型
     */
    public function dispatch(Server $server, int $src_worker_id, $message): void;
}