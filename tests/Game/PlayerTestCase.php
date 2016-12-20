<?php namespace BattleAPI\Tests\Game;

use BattleAPI\Tests\TestCase;
use BattleAPI\Response\Response;
use BattleAPI\Game\Player;

abstract class PlayerTestCase extends TestCase
{
    /** @var Player */
    protected $player;

    /** @var string */
    protected $playerId = '320812621';

    /** @var string */
    protected $playerName = 'Grzesie2k';

    /** @var string */
    protected $playerClass;

    public function setUp()
    {
        parent::setUp();
        $this->player = new $this->playerClass($this->playerId);
    }

    public function testGetInfo()
    {
        $playerInfo = $this->player->getInfo();
        $this->assertInstanceOf(Response::class, $playerInfo);
    }

    public function testFind(){
        $playerFindResponse = call_user_func("{$this->playerClass}::find", $this->playerName);
        $this->assertInstanceOf(Response::class, $playerFindResponse);
    }
}
