<?php namespace DustinGraham\ReactMysql;

use PHPDaemon\Core\AppInstance;
use PHPDaemon\Servers\WebSocket\Pool;

class Application extends AppInstance
{
    /**
     * @var \PHPDaemon\Clients\MySQL\Pool
     */
    public $sql;
    
    public function init()
    {
        $this->sql = \PHPDaemon\Clients\MySQL\Pool::getInstance();
    }
    
    public function onReady()
    {
        $that = $this;
        Pool::getInstance()->addRoute('/', function($client) use($that)
        {
            return new Route($client, $that);
        });
    }
}
