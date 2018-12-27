<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/27
 * Time: 15:09
 */

namespace MMC\Swoole\Listener\Common;

use Swoole\Http\Request;
use Swoole\Http\Response;

interface ControllerInterface
{
    public function setRequest(Request $request);

    public function setResponse(Response $response);
}