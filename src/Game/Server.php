<?php namespace BattleAPI\Game;

use BattleAPI\Response\Response;

interface Server
{
    /**
     * @param string $serverId
     * @param Platform $platform
     */
    public function __construct($serverId, Platform $platform);

    /**
     * @return Response
     */
    public function getInfo();

    /**
     * @return Response
     */
    public function getStatus();

    /**
     * @return Response
     */
    public function getPlayers();

    /**
     * @return string
     */
    public function getId();

    /**
     * @return Response
     */
    public function getPlatform();
}
