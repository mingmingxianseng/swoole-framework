<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:58
 */

namespace MMC\Swoole\Listener;

use Swoole\Server;

interface OnPacketInterface
{
    public function dispatch(Server $server, string $data, array $client_info);
}