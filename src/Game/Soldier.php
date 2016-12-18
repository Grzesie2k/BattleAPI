<?php namespace BattleAPI\Game;

use BattleAPI\Response\Response;

interface Soldier
{
    /**
     * @param string $soldierId
     * @param Platform $platform
     */
    public function __construct($soldierId, Platform $platform);

    /**
     * @return string
     */
    public function getId();

    /**
     * @return Platform
     */
    public function getPlatform();

    /**
     * @return Response
     */
    public function getOverview();
}
