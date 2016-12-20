<?php namespace BattleAPI\Tests\Game\BF4;

use BattleAPI\Game\BF4\Server;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use BattleAPI\Tests\TestCase;

class ServerTest extends TestCase
{
    /** @var Server */
    protected $server;

    public function setUp()
    {
        parent::setUp();
        $serverId = '7f572ebc-56b6-4f1e-adc2-7f6441f87749';
        $platform = new Platform(Platform::PC);
        $this->server = new Server($serverId, $platform);
    }

    public function testGetInfo()
    {
        $serverInfo = $this->server->getInfo();
        $this->assertInstanceOf(Response::class, $serverInfo);
    }

    public function testGetStatus()
    {
        $serverStatus = $this->server->getStatus();
        $this->assertInstanceOf(Response::class, $serverStatus);
    }

    public function testGetPlayers()
    {
        $serverPlayers = $this->server->getPlayers();
        $this->assertInstanceOf(Response::class, $serverPlayers);
    }
}
