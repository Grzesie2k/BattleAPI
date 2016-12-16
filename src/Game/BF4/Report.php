<?php namespace BattleAPI\Game\BF4;

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
     * @return Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getGeneralInfo()
    {
        $url = Game::ENDPOINT . "/battlereport/loadgeneralreport/{$this->id}/{$this->platform->getId()}/0/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @param Soldier $soldier
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getSoldierInfo(Soldier $soldier)
    {
        $url = Game::ENDPOINT . "/battlereport/loadgeneralreport/{$this->id}/{$this->platform->getId()}/{$soldier->getId()}/";
        return Client::request(Client::GET, $url);
    }

}
