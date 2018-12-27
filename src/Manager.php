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
    private $options
        = [
            'manager_pid' => '',
            'master_pid'  => '',
        ];

    public function __construct(string $masterPidPath, string $managerPidPath)
    {
        $this->options['master_pid']  = $masterPidPath;
        $this->options['manager_pid'] = $managerPidPath;
    }

    public function reload()
    {
        echo "{$this->options['project_name']} reload...\n";
        file_exists($this->options['master_pid']) && shell_exec("kill -USR1 `cat {$this->options['master_pid']}`");
        file_exists($this->options['manager_pid']) && shell_exec("kill -USR1 `cat {$this->options['manager_pid']}`");
    }

    public function stop()
    {
        echo "{$this->options['project_name']} stop...\n";

        file_exists($this->options['master_pid']) && shell_exec("kill -15 `cat {$this->options['master_pid']}`");

        file_exists($this->options['manager_pid']) && shell_exec("kill -15 `cat {$this->options['manager_pid']}`");

        echo "stop success.";

        $output = shell_exec("ps aux | grep " . $this->options['manager_pid']);
        echo $output . PHP_EOL;
        $output = shell_exec("ps aux | grep " . $this->options['master_pid']);
        echo $output . PHP_EOL;
    }
}