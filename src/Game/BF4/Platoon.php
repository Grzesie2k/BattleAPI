<?php namespace BattleAPI\Game\BF4;

use BattleAPI\Client;
use BattleAPI\Game\Platform;
use BattleAPI\Response\HtmlResponse;
use BattleAPI\Response\SimpleResponse;

class Platoon implements \BattleAPI\Game\Platoon
{
    /** @var string */
    protected $id;

    /** @var Platform */
    protected $platform;

    /**
     * @param string $platoonId
     * @param Platform $platform
     */
    public function __construct($platoonId, Platform $platform)
    {
        $this->id = $platoonId;
        $this->platform = $platform;
    }

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
    public function getInfo()
    {
        $url = Game::ENDPOINT . "/platoons/view/{$this->id}/";
        return Client::request(Client::GET, $url, [], HtmlResponse::class);
    }

    /**
     * @return HtmlResponse
     * @TODO Add Response class
     */
    public function getMembers()
    {
        $url = Game::ENDPOINT . "/platoons/members/{$this->id}/";
        return Client::request(Client::GET, $url, [], HtmlResponse::class);
    }
}
