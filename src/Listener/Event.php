<?php
/**
 * Created by PhpStorm.
 * User: chenmingming
 * Date: 2018/9/19
 * Time: 11:03
 */

namespace MMC\Swoole\Listener;

final class Event
{
    const START = 'start';
    const SHUTDOWN = 'shutdown';
    const WORKER_START = 'workerStart';
    const WORKER_STOP = 'workerStop';
    const WORKER_EXIT = 'workerExit';
    const CONNECT = 'connect';
    const RECEIVE = 'receive';
    const PACKET = 'packet';
    const CLOSE = 'close';
    const BUFFER_FULL = 'bufferFull';
    const BUFFER_EMPTY = 'bufferEmpty';
    const TASK = 'task';
    const FINISH = 'finish';
    const PIPE_MESSAGE = 'pipeMessage';
    const WORKER_ERROR = 'workerError';
    const MANAGER_START = 'managerStart';
    const MANAGER_STOP = 'managerStop';
    const REQUEST = 'request';

}