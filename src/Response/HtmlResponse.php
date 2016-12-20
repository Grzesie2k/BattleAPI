<?php namespace BattleAPI\Response;

use BattleAPI\Exception;

class HtmlResponse extends \stdClass implements Response
{
    /**
     * @param array $info
     * @param string $response
     * @throws Exception
     */
    public function __construct(array $info, $response)
    {
        if ($info['http_code'] != 200) {
            throw new Exception("Battlelog respond with HTTP code {$info['http_code']}", $info['http_code']);
        }
        $response = static::getGlobalContext($response);
        echo $response;
        $response = json_decode($response);

        if ($response === null) {
            throw new Exception("Cannot parse JSON response Surface.globalContext object", json_last_error());
        }

        foreach ($response as $key => $value) {
            $this->$key = $value;
        }
    }

    protected static function getGlobalContext($response)
    {
        $match = 'Surface.globalContext = ';
        $startPos = strpos($response, $match);
        if ($startPos === false) {
            throw new Exception("Cannot find Surface.globalContext object in response");
        }
        $response = substr($response, $startPos + strlen($match));
        $response = substr($response, 0, strpos($response, '};') + 1);

        return $response;
    }
}
