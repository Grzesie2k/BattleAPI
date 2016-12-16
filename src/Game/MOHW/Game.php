<?php namespace BattleAPI\Game\MOHW;

use BattleAPI\Client;
use BattleAPI\Game\Platform;

class Game extends \BattleAPI\Game\Game
{
    const NAME = "Medal of Honor: Warfighter";
    const CODE = "mohw";
    const ENDPOINT = Client::ENDPOINT . '/' . Game::CODE;

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
