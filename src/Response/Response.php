<?php namespace BattleAPI\Response;

interface Response {
    /**
     * @param array $info
     * @param string $response
     */
    public function __construct(array $info, $response);
}
