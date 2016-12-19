<?php namespace BattleAPI\Tests\Game\MOHW;

use BattleAPI\Game\MOHW\Server;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{
    /** @var Server */
    protected $server;

    public function setUp()
    {
        $serverId = '944888d5-15f7-4fa1-b05c-9e3492ac843d';
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
