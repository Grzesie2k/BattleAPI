<?php namespace BattleAPI\Tests\Game\BF3;

use BattleAPI\Game\BF3\Server;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class ServerTest extends TestCase
{
    /** @var Server */
    protected $server;

    public function setUp()
    {
        $platform = new Platform(Platform::PC);
        $serverId = '7fd7ecc1-cc18-432a-abb5-bf79a2ff2d76';
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
