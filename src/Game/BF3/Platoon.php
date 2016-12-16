<?php namespace BattleAPI\Game\BF3;

use BattleAPI\Client;
use BattleAPI\Game\Platform;
use BattleAPI\Response\SimpleResponse;

class Platoon implements \BattleAPI\Game\Platoon
{
    /** @var string */
    protected $id;

    /** @var Platform */
    protected $platform;

    public function __construct($platoonId, Platform $platform)
    {
        $this->id = $platoonId;
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
    public function getMembers()
    {
        $url = Game::ENDPOINT . "/platoon/platoonMemberStats/{$this->id}/2/{$this->platform->getId()}/";
        return Client::request(Client::GET, $url);
    }
}
