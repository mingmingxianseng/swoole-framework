<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:25
 */

namespace MMC\Swoole\Listener\Abs;

use MMC\Swoole\Listener\Event;
use MMC\Swoole\Listener\OnWorkerStartInterface;

abstract class AbsWorkerStart extends AbsListener implements OnWorkerStartInterface
{
    public function getEvent(): string
    {
        return Event::WORKER_START;
    }

}