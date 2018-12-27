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

    private $masterPidPath;
    private $processName;

    public function __construct(string $masterPidPath, string $processName, LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->masterPidPath = $masterPidPath;
        $this->processName   = $processName;
    }

    public function dispatch(Server $server): void
    {
        $result = file_put_contents($this->masterPidPath, $server->master_pid);
        if ($result === false) {
            throw new \RuntimeException("master pid file create failed. path:{$this->masterPidPath}");
        }
        if (PHP_OS !== 'Darwin') {
            swoole_set_process_name($this->processName);
        }
    }

}