<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:31
 */

namespace MMC\Swoole\Listener\Abs;

use MMC\Swoole\Listener\Event;
use MMC\Swoole\Listener\OnReceiveInterface;

abstract class AbsReceive extends AbsListener implements OnReceiveInterface
{
    public function getEvent(): string
    {
        return Event::RECEIVE;
    }
}