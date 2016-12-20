<?php namespace BattleAPI;

use BattleAPI\Response\Response;
use BattleAPI\Response\JsonResponse;
use Psr\Log\LoggerInterface;

abstract class Client
{
    const VERSION = '2.0.0';

    const ENDPOINT = "http://battlelog.battlefield.com";
    const USERAGENT = "BattleAPI";

    /** HTTP METHODS */
    const GET = 'GET';
    const POST = 'POST';

    /** @var  LoggerInterface */
    protected static $logger;

    public static function setLogger(LoggerInterface $logger)
    {
        static::$logger = $logger;
    }

    /** @var int cURL timeout in ms */
    protected static $timeout = 1000;

    public static function setTimeout($timeout)
    {
        static::$timeout = $timeout;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @param string $class
     * @return Response
     * @throws Exception
     */
    public static function request($method, $url, array $data = [], $class = JsonResponse::class)
    {
        if (static::$logger) {
            static::$logger->debug("Request: {$url}", $data);
        }
        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            [
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_USERAGENT => static::USERAGENT,
                CURLOPT_TIMEOUT_MS => static::$timeout,
                CURLOPT_RETURNTRANSFER => true,
            ]
        );
        switch ($method) {
            case Client::POST:
                curl_setopt_array(
                    $curl,
                    [
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $data,
                    ]
                );
        }

        $result = curl_exec($curl);

        if ($result === false) {
            throw new Exception(curl_error($curl), curl_errno($curl));
        }

        if (static::$logger) {
            static::$logger->debug("Response: {$result}");
        }

        $curlInfo = curl_getinfo($curl);
        curl_close($curl);

        return new $class($curlInfo, $result);
    }
}
