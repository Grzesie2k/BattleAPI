<?php namespace BattleAPI\Game\BF4;

use BattleAPI\Client;
use BattleAPI\Game\Platform;
use BattleAPI\Response\SimpleResponse;

class Server implements \BattleAPI\Game\Server
{
    /** @var string */
    protected $id;

    /** @var Platform */
    protected $platform;

    /**
     * @param string $serverId
     * @param Platform $platform
     */
    public function __construct($serverId, Platform $platform)
    {
        $this->id = $serverId;
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
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getInfo()
    {
        $url = Game::ENDPOINT . "servers/show/{$this->platform->getCode()}/{$this->id}/?json=1";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getStatus()
    {
        $url = Game::ENDPOINT . "/servers/getNumPlayersOnServer/{$this->platform->getCode()}/{$this->id}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return SimpleResponse
     * @TODO Add Response class
     */
    public function getPlayers()
    {
        $url = Game::ENDPOINT."/servers/getPlayersOnServer/{$this->platform->getCode()}/{$this->id}/";
        return Client::request(Client::GET, $url);
    }

    /**
     * @return Platform
     */
    public function getPlatform()
    {
        return $this->platform;
    }
}
