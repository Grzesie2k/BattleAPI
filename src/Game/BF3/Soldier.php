<?php namespace BattleAPI\Game\BF3;

use BattleAPI\Client;
use BattleAPI\Game\Platform;
use BattleAPI\Response\SimpleResponse;

class Soldier implements \BattleAPI\Game\Soldier
{
    /** @var string */
    protected $id;

    /** @var Platform */
    protected $platform;

    /**
     * @param string $soldierId
     * @param Platform $platform
     */
    public function __construct($soldierId, Platform $platform)
    {
        $this->id = $soldierId;
        $this->platform = $platform;
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getOverview()
    {
        $url = GAME::ENDPOINT . "/overviewPopulateStats/{$this->id}/NULL/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getWeapons()
    {
        $url = GAME::ENDPOINT . "/weaponsPopulateStats/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getVehicles()
    {
        $url = GAME::ENDPOINT . "/vehiclesPopulateStats/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getAwards()
    {
        $url = GAME::ENDPOINT . "/awardsPopulateStats/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getMissions()
    {
        $url = GAME::ENDPOINT . "/soldier/missionsPopulateStats/NULL/{$this->id}/0/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getDogTags()
    {
        $url = GAME::ENDPOINT . "/soldier/dogtagsPopulateStats/NULL/{$this->id}/0/{$this->platform->getId()}/0/";
        return Client::request(Client::GET, $url);
    }
}
