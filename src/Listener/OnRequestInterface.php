<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:39
 */

namespace MMC\Swoole\Listener;

use Swoole\Http\Request;
use Swoole\Http\Response;

interface OnRequestInterface extends ListenerInterface
{
    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return void
     */
    public function dispatch(Request $request, Response $response): void;
}