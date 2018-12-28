<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/12/28
 * Time: 10:17
 */


$output = shell_exec("ps -p 168 | wc -l");

var_dump($output);
