<?php namespace BattleAPI\Tests\Game\BF4;

use BattleAPI\Game\BF4\Soldier;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class SoldierTest extends TestCase
{
    /** @var Soldier */
    protected $soldier;

    public function setUp()
    {
        $soldierId = '320812621';
        $platform = new Platform(Platform::PC);
        $this->soldier = new Soldier($soldierId, $platform);
    }

    public function testGetPlatform()
    {
        $platform = new Platform(Platform::PC);
        $this->assertEquals($platform, $this->soldier->getPlatform());
    }

    public function testGetOverview()
    {
        $soldierOverview = $this->soldier->getOverview();
        $this->assertInstanceOf(Response::class, $soldierOverview);
    }

    public function testGetHistory()
    {
        $soldierHistory = $this->soldier->getHistory();
        $this->assertInstanceOf(Response::class, $soldierHistory);
    }

    public function testGetVehicles()
    {
        $soldierVehicles = $this->soldier->getVehicles();
        $this->assertInstanceOf(Response::class, $soldierVehicles);
    }

    public function testGetReports()
    {
        $soldierReports = $this->soldier->getReports();
        $this->assertInstanceOf(Response::class, $soldierReports);
    }

    public function testGetPopulateStats()
    {
        $soldierPopulateStats = $this->soldier->getPopulateStats();
        $this->assertInstanceOf(Response::class, $soldierPopulateStats);
    }

    public function testGetDogTags()
    {
        $soldierDogTags = $this->soldier->getDogTags();
        $this->assertInstanceOf(Response::class, $soldierDogTags);
    }

    public function testGetWeaponsUnlocks()
    {
        $soldierWeaponsUnlocks = $this->soldier->getWeaponsUnlocks();
        $this->assertInstanceOf(Response::class, $soldierWeaponsUnlocks);
    }

    public function testGetVehiclesUnlocks()
    {
        $soldierVehiclesUnlocks = $this->soldier->getVehiclesUnlocks();
        $this->assertInstanceOf(Response::class, $soldierVehiclesUnlocks);
    }

    public function testGetKit()
    {
        $soldierKit = $this->soldier->getKit();
        $this->assertInstanceOf(Response::class, $soldierKit);
    }

    public function testGetLoadout()
    {
        $soldierLoadout = $this->soldier->getLoadout();
        $this->assertInstanceOf(Response::class, $soldierLoadout);
    }

    public function testGetMissions()
    {
        $soldierMissions = $this->soldier->getMissions();
        $this->assertInstanceOf(Response::class, $soldierMissions);
    }

    public function testGetBattlePacks()
    {
        $soldierBattlePacks = $this->soldier->getBattlePacks();
        $this->assertInstanceOf(Response::class, $soldierBattlePacks);
    }

}
