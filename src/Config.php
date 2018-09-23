<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/23
 * Time: 22:46
 */

namespace MMC\Swoole;

use Symfony\Component\Yaml\Yaml;


class Config
{
    private $config;

    public function __construct()
    {
        if (!defined('CONF_PATH')) {
            define('CONF_PATH', __DIR__ . '/config');
        }
        $this->init();
    }

    private function init()
    {
        $files  = glob(CONF_PATH . '/*.yaml');
        $config = [];
        foreach ($files as $file) {
            $config = array_merge($config, Yaml::parseFile($file));
        }
        $this->config = $config;
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $this->config[$key] ?? null;
    }

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set(string $key, $value)
    {
        $this->config[$key] = $value;
    }
}
