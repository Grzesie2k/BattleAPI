<?php namespace BattleAPI\Tests\Game\BF3;

use BattleAPI\Game\BF3\Soldier;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class SoldierTest extends TestCase
{
    /** @var Soldier */
    protected $soldier;

    public function setUp()
    {
        $platform = new Platform(Platform::PC);
        $soldierId = '320812621';
        $this->soldier = new Soldier($soldierId, $platform);
    }

    public function testGetOverview()
    {
        $soldierOverview = $this->soldier->getOverview();
        $this->assertInstanceOf(Response::class, $soldierOverview);
    }

    public function testGetWeapons()
    {
       $soldierWeapons = $this->soldier->getWeapons();
       $this->assertInstanceOf(Response::class, $soldierWeapons);
    }

    public function testGetVehicles()
    {
        $soldierVehicles = $this->soldier->getVehicles();
        $this->assertInstanceOf(Response::class, $soldierVehicles);
    }

    public function testGetAwards()
    {
        $soldierAwards = $this->soldier->getAwards();
        $this->assertInstanceOf(Response::class, $soldierAwards);
    }

    public function testGetMissions()
    {
        $soldierMissions = $this->soldier->getMissions();
        $this->assertInstanceOf(Response::class, $soldierMissions);
    }

    public function testGetDogTags()
    {
        $soldierDogTags = $this->soldier->getDogTags();
        $this->assertInstanceOf(Response::class, $soldierDogTags);
    }
}
