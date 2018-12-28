<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/27
 * Time: 11:22
 */

namespace MMC\Swoole\Listener\Common;

use MMC\Swoole\Listener\Abs\AbsOnManagerStart;
use Psr\Log\LoggerInterface;
use Swoole\Server;

class CommonOnManagerStart extends AbsOnManagerStart
{
    private $name;

    public function __construct(string $name, LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->name = $name;
    }

    public function dispatch(Server $server): void
    {
        if (PHP_OS !== 'Darwin') {
            swoole_set_process_name($this->name);
        }
    }

}