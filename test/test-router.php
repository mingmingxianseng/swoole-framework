<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/27
 * Time: 15:43
 */

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

include __DIR__ . '/../vendor/autoload.php';

$container = \MMC\Swoole\Container::getInstance();

$container['dispatcher'] = function () {
    return simpleDispatcher(
        function (RouteCollector $r) {
            $r->addRoute('GET', '/article/index', Article::class . ":index");
        }
    );
};

class Demo extends \MMC\Swoole\Listener\Common\FastRouteOnRequest
{
    protected function exceptionHandler(\Throwable $t, \Swoole\Http\Response $response)
    {
        echo($t);
    }

}

class Article implements \MMC\Swoole\Listener\Common\ControllerInterface
{
    public function setRequest(\Swoole\Http\Request $request)
    {

    }

    public function setResponse(\Swoole\Http\Response $response)
    {
    }

    public function index()
    {
        echo 123;
    }
}

$listener = new Demo([], new \Psr\Log\NullLogger());

$request         = new \Swoole\Http\Request();
$request->server = [
    'request_method' => 'GET',
    'path_info'      => '/article/index'
];
$response        = new \Swoole\Http\Response();
$listener->dispatch($request, $response);

