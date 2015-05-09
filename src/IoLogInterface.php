<?php

namespace Carnage\EventLog;

/**
 * Interface IoLogInterface
 * @package Carnage\EventLog
 */
interface IoLogInterface
{
    /**
     * @param string|int $connId
     * @param string $string
     * @return void
     */
    public function in($connId, $string);

    /**
     * @param string|int $connId
     * @param string $string
     * @return void
     */
    public function out($connId, $string);

    /**
     * @param string|int $connId
     * @param \Exception $exception
     * @return void
     */
    public function error($connId, \Exception $exception);
}