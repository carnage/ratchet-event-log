<?php

namespace Carnage\EventLog\Log;

use Carnage\EventLog\IoLogInterface;

/**
 * Class StdOut
 * @package Carnage\EventLog\Log
 */
class StdOut implements IoLogInterface
{
    /**
     * @param string|int $connId
     * @param string $string
     * @return void
     */
    public function in($connId, $string)
    {
        printf("< [%s] %s\n", $connId, $string);
    }

    /**
     * @param string|int $connId
     * @param string $string
     * @return void
     */
    public function out($connId, $string)
    {
        printf("> [%s] %s\n", $connId, $string);
    }

    /**
     * @param string|int $connId
     * @param \Exception $exception
     * @return void
     */
    public function error($connId, \Exception $exception)
    {
        printf("* [%s] %s\n", $connId, $exception->getMessage());
    }
}
