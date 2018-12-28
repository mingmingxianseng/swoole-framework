<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/27
 * Time: 14:08
 */

namespace MMC\Swoole\Listener\Common;

use MMC\Swoole\Listener\Abs\AbsOnStart;
use Psr\Log\LoggerInterface;
use Swoole\Server;

class CommonOnStart extends AbsOnStart
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