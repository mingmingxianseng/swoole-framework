<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:15
 */

namespace MMC\Swoole\Listener\Abs;

use MMC\Swoole\Listener\Event;
use MMC\Swoole\Listener\OnStartInterface;

abstract class AbsOnStart extends AbsListener implements OnStartInterface
{
    public function getEvent(): string
    {
        return Event::START;
    }

}