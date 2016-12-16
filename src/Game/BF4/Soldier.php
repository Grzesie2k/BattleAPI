<?php namespace BattleAPI\Game\BF4;

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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getOverview()
    {
        $url = Game::ENDPOINT . "/warsawoverviewpopulate/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getHistory()
    {
        $url = Game::ENDPOINT . "/warsawoverviewhistory/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getVehicles()
    {
        $url = Game::ENDPOINT . "/warsawvehiclesPopulateStats/{$this->id}/{$this->platform->getId()}/stats/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getReports()
    {
        $url = Game::ENDPOINT . "/warsawbattlereportspopulate/{$this->id}/2048/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getPopulateStats()
    {
        $url = Game::ENDPOINT . "/warsawdetailedstatspopulate/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getDogTags()
    {
        $url = Game::ENDPOINT . "/soldier/dogtagsPopulateStats/0/{$this->id}/0/{$this->platform->getId()}/0/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getWeaponsUnlocks()
    {
        $url = Game::ENDPOINT . "/warsawWeaponsPopulateStats/{$this->id}/{$this->platform->getId()}/unlocks/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getVehiclesUnlocks()
    {
        $url = Game::ENDPOINT . "/warsawvehiclesPopulateStats/{$this->id}/{$this->platform->getId()}/unlocks/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getKit()
    {
        $url = Game::ENDPOINT . "/warsawkitspopulatestats/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getLoadout()
    {
        $url = Game::ENDPOINT . "/loadout/get/0/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getMissions()
    {
        $url = Game::ENDPOINT . "/soldier/missionsPopulateStats/0/{$this->id}/0/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getBattlePacks()
    {
        $url = Game::ENDPOINT . "/warsawbattlepackspopulate/{$this->id}/2048/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }
}
