<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:16
 */

namespace MMC\Swoole\Listener\Abs;

use Psr\Log\LoggerInterface;
use MMC\Swoole\Listener\ListenerInterface;

abstract class AbsListener implements ListenerInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(...$args)
    {
        $this->logger->debug("trigger event:" . $this->getEvent());
        if (method_exists($this, 'dispatch')) {
            call_user_func([$this, 'dispatch'], ...$args);
        }
    }

}