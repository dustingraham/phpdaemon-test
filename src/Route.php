<?php namespace DustinGraham\ReactMysql;

/**
 * Class Route
 * @package DustinGraham\ReactMysql
 * @property \DustinGraham\ReactMysql\Application $appInstance
 */
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
        
        if ($data == 'check')
        {
            $client = $this->client;
            $this->appInstance->sql->getConnection(function($sql) use ($client) {
                $sql->query('SELECT * FROM test', function($sql, $success) use ($client)
                {
                    D($sql);
                    D($success);
                    $rows = $sql->resultRows;
                    $client->sendFrame('works: '.count($rows));
                });
            });
        }
    }
    
    public function handleException($e)
    {
        $this->client->sendFrame('exception...');
        D($e);
    }
}
