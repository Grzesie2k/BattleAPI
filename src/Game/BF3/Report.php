<?php namespace BattleAPI\Game\BF3;

use BattleAPI\Client;
use BattleAPI\Game\Platform;
use BattleAPI\Response\SimpleResponse;

class Report
{
    /** @var string */
    protected $id;

    /** @var Platform */
    protected $platform;

    /**
     * @param string $reportId
     * @param Platform $platform
     */
    public function __construct($reportId, Platform $platform)
    {
        $this->id = $reportId;
        $this->platform = $platform;
    }

    /**
     * @return SimpleResponse
     * TODO Add Response class
     */
    public function getGeneralInfo()
    {
        $url = Game::ENDPOINT . "/battlereport/loadgeneralreport/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }
}
