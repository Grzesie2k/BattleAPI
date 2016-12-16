<?php namespace BattleAPI\Game;

use BattleAPI\Response\Response;

interface Player
{
    /**
     * @param string $playerId
     */
    public function __construct($playerId);

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $playerName
     * @return Response
     */
    public static function find($playerName);

    /**
     * @return Response
     */
    public function getInfo();
}
