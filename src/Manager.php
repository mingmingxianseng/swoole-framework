<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/26
 * Time: 22:44
 */

namespace MMC\Swoole;

class Manager
{
    private $pidFile;

    public function __construct($pidFile)
    {
        $this->pidFile = $pidFile;
    }

    private function opCacheClear()
    {
        if (function_exists('apc_clear_cache')) {
            apc_clear_cache();
        }
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }
    }

    public function reload()
    {
        if (file_exists($this->pidFile)) {
            $this->opCacheClear();
            $pid = file_get_contents($this->pidFile);
            if (!\swoole_process::kill($pid, 0)) {
                echo "pid :{$pid} not exist \n";

                return;
            }
            \swoole_process::kill($pid, SIGUSR1);
            echo "send server reload command at " . date("y-m-d h:i:s") . "\n";

        } else {
            echo "PID file does not exist, please check whether to run in the daemon mode!\n";
        }

    }

    public function kill()
    {
        $this->_stop(true);
    }

    public function stop()
    {
        $this->_stop(true);
    }

    public function _stop(bool $force)
    {
        if (file_exists($this->pidFile)) {
            $pid = file_get_contents($this->pidFile);

            if (!\swoole_process::kill($pid, 0)) {
                echo "PID :{$pid} not exist \n";

                return false;
            }

            if ($force) {
                \swoole_process::kill($pid, SIGKILL);
            } else {
                \swoole_process::kill($pid);
            }

            //等待5秒
            $time = time();
            $flag = false;
            while (true) {
                usleep(1000);
                if (!\swoole_process::kill($pid, 0)) {
                    echo "server stop at " . date("y-m-d h:i:s") . "\n";
                    if (is_file($this->pidFile)) {
                        unlink($this->pidFile);
                    }
                    $flag = true;
                    break;
                } else {
                    if (time() - $time > 5) {
                        echo "stop server fail. try kill again \n";
                        break;
                    }
                }
            }

            return $flag;
        } else {
            echo "PID file does not exist, please check whether to run in the daemon mode!\n";

            return false;
        }
    }
}