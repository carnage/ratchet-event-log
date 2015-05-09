<?php
namespace Carnage\EventLog;

use Ratchet\ConnectionInterface;

/**
 * Class EventLogConnection
 * @package Carnage\EventLog
 */
final class EventLogConnection implements ConnectionInterface
{
    /**
     * @var int
     */
    private $connId;

    /**
     * @var \Ratchet\ConnectionInterface
     */
    private $wrapped;

    /**
     * @var IoLogInterface
     */
    private $log;

    /**
     * @param ConnectionInterface $wrapped
     * @param IoLogInterface $logger
     * @param $connId
     */
    public function __construct(ConnectionInterface $wrapped, IoLogInterface $logger, $connId)
    {
        $this->connId = $connId;
        $this->log = $logger;
        $this->wrapped = $wrapped;
    }

    /**
     * @return mixed
     */
    public function getConnId()
    {
        return $this->connId;
    }

    /**
     * Send data to the connection
     * @param  string $data
     * @return \Ratchet\ConnectionInterface
     */
    function send($data)
    {
        $this->log->out($this->connId, $data);
        $this->wrapped->send($data);
    }

    /**
     * Close the connection
     */
    function close()
    {
        $this->log->out($this->connId, '### CLOSE ###');
        $this->wrapped->close();
    }
}
