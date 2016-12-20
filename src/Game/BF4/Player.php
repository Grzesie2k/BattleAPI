<?php namespace BattleAPI\Game\BF4;

use BattleAPI\Client;
use BattleAPI\Response\JsonResponse;

class Player implements \BattleAPI\Game\Player
{
    /** @var string */
    protected $id;

    /**
     * @param string $playerId
     */
    public function __construct($playerId)
    {
        $this->id = $playerId;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $playerName
     * @return JsonResponse
     * @TODO Add Response class
     */
    public static function find($playerName)
    {
        $url = Game::ENDPOINT . "/search/getMatches";
        return Client::request(Client::POST, $url, ['name' => $playerName]);
    }

    /**
     * @return JsonResponse
     * @TODO Add Response class
     */
    public function getInfo()
    {
        $url = Game::ENDPOINT . "/user/overviewBoxStats/{$this->id}/";
        return Client::request(Client::GET, $url);
    }
}
