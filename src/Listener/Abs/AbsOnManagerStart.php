<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:15
 */

namespace MMC\Swoole\Listener\Abs;

use MMC\Swoole\Listener\Event;
use MMC\Swoole\Listener\OnManagerStartInterface;
use MMC\Swoole\Listener\OnStartInterface;

abstract class AbsOnManagerStart extends AbsListener implements OnManagerStartInterface
{
    public function getEvent(): string
    {
        return Event::MANAGER_START;
    }

}