<?php namespace BattleAPI\Game\BF3;

use BattleAPI\Client;
use BattleAPI\Game\Platform;

class Game extends \BattleAPI\Game\Game
{
    const ENDPOINT = Client::ENDPOINT . '/' . Game::CODE;
    const NAME = "Battlefield 3";
    const CODE = "bf3";

    /**
     * @return Platform[]
     */
    public static function getPlatforms()
    {
        return [
            new Platform(Platform::PC),
            new Platform(Platform::PS3),
            new Platform(Platform::XBOX360)
        ];
    }
}
