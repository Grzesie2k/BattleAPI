<?php namespace BattleAPI\Game\BF4;

use BattleAPI\Client;
use BattleAPI\Game\Platform;

class Game extends \BattleAPI\Game\Game
{
    const NAME = "Battlefield 4";
    const CODE = "bf4";
    const ENDPOINT = Client::ENDPOINT . '/' . Game::CODE;

    /**
     * @return Platform[]
     */
    public static function getPlatforms()
    {
        return [
            new Platform(Platform::PC),
            new Platform(Platform::PS3),
            new Platform(Platform::PS4),
            new Platform(Platform::XBOXONE),
            new Platform(Platform::XBOX360)
        ];
    }
}
