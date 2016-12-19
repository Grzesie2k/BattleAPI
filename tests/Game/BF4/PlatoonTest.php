<?php namespace BattleAPI\Tests\Game\BF4;

use BattleAPI\Game\BF4\Platoon;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class PlatoonTest extends TestCase
{
    /** @var Platoon */
    protected $platoon;

    public function setUp()
    {
        $platoonId = '6955123057977347980';
        $platform = new Platform(Platform::PC);
        $this->platoon = new Platoon($platoonId, $platform);
    }

    public function testGetMembers()
    {
        $platoonMembers = $this->platoon->getMembers();
        $this->assertInstanceOf(Response::class, $platoonMembers);
    }

    public function testGetInfo()
    {
        $platoonInfo = $this->platoon->getInfo();
        $this->assertInstanceOf(Response::class, $platoonInfo);
    }
}
