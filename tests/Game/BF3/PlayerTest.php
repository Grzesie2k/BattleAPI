<?php namespace BattleAPI\Tests\Game\BF3;

use BattleAPI\Game\BF3\Player;
use BattleAPI\Response\Response;

class PlayerTest extends TestCase
{
    /** @var Player */
    protected $player;

    public function setUp()
    {
        parent::setUp();
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
    }
}
