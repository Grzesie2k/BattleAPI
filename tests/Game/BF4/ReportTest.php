<?php namespace BattleAPI\Tests\Game\BF4;

use BattleAPI\Game\BF4\Report;
use BattleAPI\Game\BF4\Soldier;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;
use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase
{
    /** @var Report */
    protected $report;

    /** @var Soldier */
    protected $soldier;

    public function setUp()
    {
        $reportId = '785918888624857280';
        $soldierId = '320812621';
        $platform = new Platform(Platform::PC);

        $this->report = new Report($reportId, $platform);
        $this->soldier = new Soldier($soldierId, $platform);
    }

    public function testGetGeneralInfo()
    {
        $generalInfo = $this->report->getGeneralInfo();
        $this->assertInstanceOf(Response::class, $generalInfo);
    }

    public function testGetSoldierInfo()
    {
        $soldierInfo = $this->report->getSoldierInfo($this->soldier);
        $this->assertInstanceOf(Response::class, $soldierInfo);
    }
}
