<?php namespace DustinGraham\ReactMysql;

use PHPDaemon\Core\AppInstance;
use PHPDaemon\Servers\WebSocket\Pool;

class Application extends AppInstance
{
    public function init()
    {
        
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
