<?php namespace BattleAPI\Game;

use BattleAPI\Response\Response;

interface Platoon {
    /**
     * @param string $platoonId
     * @param Platform $platform
     */
    public function __construct($platoonId, Platform $platform);

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
    public function getMembers();
}
