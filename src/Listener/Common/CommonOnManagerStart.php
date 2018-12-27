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
    private $managerPidPath;
    private $processName;

    public function __construct(string $masterPidPath, string $processName, LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->managerPidPath = $masterPidPath;
        $this->processName    = $processName;
    }

    public function dispatch(Server $server): void
    {
        $result = file_put_contents($this->managerPidPath, $server->manager_pid);
        if ($result === false) {
            throw new \RuntimeException("manager pid file create failed. path:{$this->managerPidPath}");
        }
        if (PHP_OS !== 'Darwin') {
            swoole_set_process_name($this->processName);
        }
    }

}