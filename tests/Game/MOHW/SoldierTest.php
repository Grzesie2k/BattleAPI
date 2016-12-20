<?php namespace BattleAPI\Tests\Game\MOHW;

use BattleAPI\Game\MOHW\Soldier;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;

class SoldierTest extends TestCase
{
    /** @var Soldier */
    protected $soldier;

    public function setUp()
    {
        parent::setUp();
        $soldierId = '829216888';
        $platform = new Platform(Platform::PC);
        $this->soldier = new Soldier($soldierId, $platform);
    }

    public function testGetOverview()
    {
        $soldierOverview = $this->soldier->getOverview();
        $this->assertInstanceOf(Response::class, $soldierOverview);
    }

    public function testGetDetailed()
    {
        $soldierDetailed = $this->soldier->getDetailed();
        $this->assertInstanceOf(Response::class, $soldierDetailed);
    }

    public function testGetTours()
    {
        $soldierTours = $this->soldier->getTours();
        $this->assertInstanceOf(Response::class, $soldierTours);
    }

    public function testGetAwards()
    {
        $soldierAwards = $this->soldier->getAwards();
        $this->assertInstanceOf(Response::class, $soldierAwards);
    }

    public function testGetWeapons()
    {
        $soldierWeapons = $this->soldier->getWeapons();
        $this->assertInstanceOf(Response::class, $soldierWeapons);
    }

    public function testGetSoldiers()
    {
        $soldiers = $this->soldier->getSoldiers();
        $this->assertInstanceOf(Response::class, $soldiers);
    }

}
