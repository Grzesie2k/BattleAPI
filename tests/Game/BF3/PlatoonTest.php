<?php namespace BattleAPI\Tests\Game\BF3;

use BattleAPI\Game\BF3\Platoon;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;

class PlatoonTest extends TestCase
{
    /** @var Platoon */
    protected $platoon;

    public function setUp()
    {
        parent::setUp();
        $platoonId = '2832655391989042266';
        $platform = new Platform(Platform::PC);
        $this->platoon = new Platoon($platoonId, $platform);
    }

    public function testGetMembers()
    {
        $membersStats = $this->platoon->getMembers();
        $this->assertInstanceOf(Response::class, $membersStats);
    }
}
