<?php namespace BattleAPI\Tests\Game\BF3;

use BattleAPI\Game\BF3\Report;
use BattleAPI\Game\Platform;
use BattleAPI\Response\Response;

class ReportTest extends TestCase
{
    /** @var Report */
    protected $report;

    public function setUp()
    {
        parent::setUp();
        $platform = new Platform(Platform::PC);
        $reportId = '86712057';
        $this->report = new Report($reportId, $platform);
    }

    public function testGetGeneralInfo()
    {
        $generalInfo = $this->report->getGeneralInfo();
        $this->assertInstanceOf(Response::class, $generalInfo);
    }
}
