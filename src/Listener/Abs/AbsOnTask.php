<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 13:58
 */

namespace MMC\Swoole\Listener\Abs;

use MMC\Swoole\Listener\Event;
use MMC\Swoole\Listener\OnTaskInterface;

abstract class AbsOnTask extends AbsListener implements OnTaskInterface
{
    public function getEvent(): string
    {
        return Event::TASK;
    }

}