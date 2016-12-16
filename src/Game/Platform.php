<?php namespace BattleAPI\Game;

use BattleAPI\Exception;

class Platform
{
    const PC = 1;
    const PS3 = 4;
    const PS4 = 32;
    const XBOXONE = 64;
    const XBOX360 = 2;

    /** @var int */
    protected $id;

    /**
     * @param $id
     */
    public function __construct($id)
    {
        $this->setId($id);
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function setId($id)
    {
        if (!is_numeric($id)) {
            throw new Exception("Invalid platform code type.");
        }

        switch ($id) {
            case static::PC:
            case static::PS3:
            case static::PS4:
            case static::XBOXONE:
            case static::XBOX360:
                $this->id = $id;
                break;
            default:
                throw new Exception("Invalid platform code.");
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @throws Exception
     * @return string
     */
    public function getCode()
    {
        switch ($this->id) {
            case static::PC:
                return 'pc';
            case static::PS3:
                return 'ps3';
            case static::PS4:
                return 'PS4';
            case static::XBOXONE:
                return 'xboxone';
            case static::XBOX360:
                return 'xbox360';
        }
        throw new Exception("Unknown platform ID.");
    }
}
