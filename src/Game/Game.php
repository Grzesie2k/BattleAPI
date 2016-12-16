<?php namespace BattleAPI\Game;

abstract class Game
{
    /**
     * @return Platform[]
     */
    abstract static function getPlatforms();
}
