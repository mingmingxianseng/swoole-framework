<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/27
 * Time: 14:30
 */

namespace MMC\Swoole\Listener\Common;

use FastRoute\Dispatcher;
use MMC\Swoole\Container;
use MMC\Swoole\Context;
use MMC\Swoole\Listener\Abs\AbsRequest;
use Psr\Log\LoggerInterface;
use Swoole\Http\Request;
use Swoole\Http\Response;

class FastRouteOnRequest extends AbsRequest
{
    protected $options
        = [
            'service_id'           => 'dispatcher',
            'debug'                => false,
            'controller_namespace' => ''
        ];

    public function __construct(array $options, LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->options = array_merge($this->options, $options);
    }

    public function dispatch(Request $request, Response $response): void
    {
        Context::set('request', $request);
        try {
            $dispatcher = Container::getInstance()->get($this->options['service_id']);
            if (!$dispatcher instanceof Dispatcher) {
                throw new \RuntimeException('dispatcher service must be instance of ' . Dispatcher::class);
            }
            $method = $request->server['request_method'];
            $info   = $dispatcher->dispatch($method, $request->server['path_info']);

            $this->logger->info($method . "\t" . $request->server['path_info']);

            switch ($info[0]) {
            case Dispatcher::FOUND:
                $this->handle($info[1], $info[2], $request, $response);
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $response->status(405);
                $allowMethods = implode(",", $info[1]);
                $response->end("405 Method not allowed. {$allowMethods} Allowed.");
                break;
            case Dispatcher::NOT_FOUND:
            default:
                $response->status(404);
                $response->end('404 NOT FUND');
            }
        } catch (\Throwable $e) {
            $this->exceptionHandler($e, $response);
        } finally {
            $this->afterRequest();
        }

    }

    /**
     * 请求结束后置时间
     */
    protected function afterRequest()
    {
        Context::clear();
    }

    protected function exceptionHandler(\Throwable $t, Response $response)
    {
        $response->status(500);
        $response->end("<h3>{$t->getMessage()}</h3>" . nl2br($t->getTraceAsString()));
    }

    /**
     * @param string   $handler
     * @param array    $params
     * @param Request  $request
     * @param Response $response
     *
     * @throws \Exception
     */
    private function handle(string $handler, array $params, Request $request, Response $response)
    {
        list($controller, $action) = explode(":", $handler);
        if (empty($controller) || empty($action)) {
            throw new \Exception("{$handler} is not invalid");
        }

        if (class_exists($controller)) {
            $class = $controller;
        } elseif ($this->options['controller_namespace']) {
            $class = "{$this->options['controller_namespace']}{$controller}";
        } else {
            throw new \Exception(
                " class[{$controller}] is invalid. must be a instance of " . ControllerInterface::class
            );
        }
        if (!is_a($class, ControllerInterface::class, true)) {
            throw new \Exception("{$class} is not a instance of " . ControllerInterface::class);
        }

        if ($params) {
            if (!$request->get) {
                $request->get = [];
            }
            $request->get = array_merge($request->get, $params);
        }
        /** @var ControllerInterface $obj */
        $obj = new $class();
        $obj->setRequest($request);
        $obj->setResponse($response);

        if (!method_exists($obj, $action)) {
            throw new \RuntimeException("method {$action} of class {$class} is not exist");
        }
        $obj->$action();

    }

}