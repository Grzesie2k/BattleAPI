<?php namespace BattleAPI\Tests\Game\BF3;

use BattleAPI\Game\BF3\Player;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    /** @var Player */
    protected $player;

    public function setUp()
    {
        $playerId = '320812621';
        $this->player = new Player($playerId);
    }

    public function testGetInfo()
    {
        $playerInfo = $this->player->getInfo();
        $this->assertInstanceOf(Response::class, $playerInfo);
    }

    public function testFind(){
        $playerName = 'Grzesie2k';
        $playerFindResponse = Player::find($playerName);
        $this->assertInstanceOf(Response::class, $playerFindResponse);
        $this->assertCount(1, $playerFindResponse->matches);
        $this->assertEquals($playerName, $playerFindResponse->matches[0]->user->username);
    }
}
