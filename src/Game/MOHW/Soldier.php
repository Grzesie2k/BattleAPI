<?php namespace BattleAPI\Game\MOHW;

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
        $url = Game::ENDPOINT . "/mohwoverviewpopulate/{$this->id}/None/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getDetailed()
    {
        $url = Game::ENDPOINT . "/mohwdetailedpopulate/None/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getTours()
    {
        $url = Game::ENDPOINT . "/mohwtourspopulate/None/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getAwards()
    {
        $url = Game::ENDPOINT . "/mohwawardspopulate/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getWeapons()
    {
        $url = Game::ENDPOINT . "/mohwweaponspopulate/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getSoldiers()
    {
        $url = Game::ENDPOINT . "/mohwunlockspopulate/None/{$this->id}/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }

}
