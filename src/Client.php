<?php namespace BattleAPI;

use BattleAPI\Game;
use BattleAPI\Response\Response;
use BattleAPI\Response\SimpleResponse;

abstract class Client
{
    const VERSION = '2.0.0';

    const ENDPOINT = "http://battlelog.battlefield.com";
    const USERAGENT = "BattleAPI";

    /** HTTP METHODS */
    const GET = 'GET';
    const POST = 'POST';

    /**
     * @return Game\Game[]
     */
    public function getGames()
    {
        return [
            new Game\BF3\Game(),
            new Game\BF4\Game(),
            new Game\MOHW\Game()
        ];
    }

    /**
     * @param string $method
     * @param string $url
     * @param array|null $data
     * @param string $class
     * @return Response
     * @throws Exception
     */
    public static function request($method, $url, array $data = null, $class = SimpleResponse::class)
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_USERAGENT => static::USERAGENT,
            CURLOPT_TIMEOUT => 1,
            CURLOPT_RETURNTRANSFER => true,
        ]);
        switch ($method) {
            case Client::POST:
                curl_setopt_array($curl, [
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $data
                ]);
        }

        $result = curl_exec($curl);

        if ($result === false) {
            throw new Exception(curl_error($curl), curl_errno($curl));
        }

        $curlInfo = curl_getinfo($curl);
        curl_close($curl);
        return new $class($curlInfo, $result);
    }
}
