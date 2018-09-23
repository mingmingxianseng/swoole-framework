<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/23
 * Time: 22:48
 */

namespace MMC\Swoole;


use Psr\Container\ContainerInterface;

use Pimple\Container as PimpleContainer;

/**
 * Class Container
 *
 * @method  Config config()
 * @package YX\Components\Container
 */
class Container extends PimpleContainer implements ContainerInterface
{
    static private $instance;

    public function __construct(array $values = array())
    {
        parent::__construct($values);
    }

    /**
     * @return Container
     */
    static public function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new static();

            self::$instance['config'] = function () {
                return new Config();
            };
        }

        return self::$instance;
    }

    public function get($id)
    {
        return $this->offsetGet($id);
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->get($this->formatMethodName($name));
    }

    /**
     * @param string $methodName
     *
     * @return string
     */
    private function formatMethodName(string $methodName)
    {
        $methodName = preg_replace_callback(
            '/([A-Z]+)/', function ($matches) {
            return '.' . strtolower($matches[0]);
        }, $methodName
        );

        return trim(preg_replace('/\.{2,}/', '.', $methodName), '.');
    }
}
