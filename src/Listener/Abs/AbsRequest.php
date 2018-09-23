<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 13:56
 */

namespace MMC\Swoole\Listener\Abs;

use MMC\Swoole\Listener\Event;
use MMC\Swoole\Listener\OnRequestInterface;

abstract class AbsRequest extends AbsListener implements OnRequestInterface
{
    public function getEvent(): string
    {
        return Event::REQUEST;
    }

}