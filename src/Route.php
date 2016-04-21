<?php namespace DustinGraham\ReactMysql;

class Route extends \PHPDaemon\WebSocket\Route
{
    public function onFrame($data, $type)
    {
        if ($data == 'ping')
        {
            $this->client->sendFrame('pong', 'STRING',
                function($client)
                {
                    D('Example Websocket pong client callback.');
                });
        }
    }
    
    public function handleException($e)
    {
        $this->client->sendFrame('exception...');
        D($e);
    }
}
