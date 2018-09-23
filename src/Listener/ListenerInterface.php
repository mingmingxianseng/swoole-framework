<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 09:44
 */

namespace MMC\Swoole\Listener;

interface ListenerInterface
{
    /**
     * 监听名称
     *
     * @return string
     */
    public function getEvent(): string;

    /**
     * @param mixed ...$args
     *
     * @return void
     */
    public function __invoke(...$args);
}