<?php namespace BattleAPI\Response;

use BattleAPI\Exception;

/**
 * Parse Response as JSON to \stdClass
 */
class SimpleResponse extends \stdClass implements Response
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
        $response = json_decode($response);

        if ($response === null) {
            throw new Exception("Cannot parse JSON response", json_last_error());
        }
        if ($response->type !== 'success') {
            throw new Exception("Not successful response (type: {$response->type})");
        }

        foreach ($response->data as $key => $value) {
            $this->$key = $value;
        }
    }
}
