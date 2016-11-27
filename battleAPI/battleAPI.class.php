<?php namespace BattleAPI;

use Exception;

/**
 * @package BattleAPI
 */
class BattleAPI
{
    /** @var array */
    private $config;

    /** @var array */
    private $game;

    /**
     * @throws Exception`
     */
    public function __construct()
    {
        $config = parse_ini_file(__DIR__ . '/config.ini');
        if (!$config) {
            throw new Exception("Cannot load config file.");
        }
        $this->config = $config;
    }

    /**
     * @return string[]
     */
    public function getAvailableGames()
    {
        $output = array();
        foreach (scandir(__DIR__) as $file) {
            if ($file = trim($file, '.') and is_dir(__DIR__ . '/' . $file)) {
                $output[] = $file;
            }
        }

        return $output;
    }

    /**
     * @param string $game
     * @return array
     */
    public function getAvailablePlatforms($game)
    {
        if (!$this->loadGame($game) || empty($this->game[$game]['platforms'])) {
            return [];
        }

        return $this->game[$game]['platforms'];
    }

    /**
     * @param string $game
     * @return bool
     */
    private function loadGame($game)
    {
        if (isset($this->game[$game])) {
            return true;
        }
        $this->game[$game] = parse_ini_file(__DIR__ . "/$game/game.ini", true);
        if (is_array($this->game[$game])) {
            $this->game[$game]['url'] = parse_ini_file(__DIR__ . "/$game/url.ini", true);

            return true;
        }

        return false;
    }

    /**
     * @param string $game
     * @return array|false
     */
    public function getAvailableObjects($game)
    {
        if (!$this->loadGame($game) || empty($this->game[$game]['url'])) {
            return false;
        }

        return array_keys($this->game[$game]['url']);
    }

    /**
     * @param string $game
     * @param $object
     * @return array|false
     */
    public function getAvailableParams($game, $object)
    {
        if (!$this->loadGame($game) || empty($this->game[$game]['url'][$object])) {
            return false;
        }

        return array_keys($this->game[$game]['url'][$object]);
    }

    /**
     * @param string $game
     * @param string $platform
     * @param string $object
     * @param string $param
     * @param string $value
     * @return array|bool|null
     */
    public function get($game, $platform, $object, $param, $value)
    {
        $k = $this->isValIdQuery($game, $platform, $object, $param, $value);
        if (!$k) {
            return false;
        }
        if (is_string($k)) {
            $value = array($k => $value);
        }
        $value['platform'] = $platform;
        $value['platformId'] = $this->game[$game]['platforms'][$platform];
        $search = $replace = [];
        foreach ($value as $k => $v) {
            $search[] = '{' . $k . '}';
            $replace[] = $v;
        }
        list($url, $post, $part) = explode(
            ' ',
            str_replace($search, $replace, $this->game[$game]['url'][$object][$param]) . '  '
        );
        $url = $this->config['battlelog'] . "/$game/" . $url;
        if (!strpos($post, '=')) {
            $part = $post;
            $post = null;
        }

        return $this->sendQuery($url, $post, $part);
    }

    /**
     * @param string $game
     * @param string $platform
     * @param $object
     * @param string $param
     * @param string $value
     * @return bool
     */
    private function isValIdQuery($game, $platform, $object, $param, $value)
    {
        if (!$this->loadGame($game)) {
            return $this->error("InvalId query parameter 1 '$game'");
        }
        if (!isset($this->game[$game]['platforms'][$platform])) {
            return $this->error("InvalId query parameter 2 '$platform'");
        }
        if (!isset($this->game[$game]['url'][$object])) {
            return $this->error("InvalId query parameter 3 '$object'");
        }
        if (!isset($this->game[$game]['url'][$object][$param])) {
            return $this->error("InvalId query parameter 4 '$param'");
        }
        $keys = $this->getQueryKeys($game, $object, $param);
        if (count($keys) == 1 && is_string($value)) {
            $keys = array_values($keys);

            return $keys[0];
        }
        if (!is_array($value)) {
            return $this->error('Parameter 5 expected to be an array');
        }
        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $this->error("Missing key '$k' in array in parameter 5");
            }
        }

        return true;
    }

    /**
     * @param $message
     * @return false
     */
    private function error($message)
    {
        $debug = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1];
        $debug = "$message in <b>$debug[file]</b> with <b>$debug[class]$debug[type]$debug[function]</b> on line <b>$debug[line]</b>";
        trigger_error($debug);

        return false;
    }

    /**
     * @param string $game
     * @param string $object
     * @param string $param
     * @return array|bool
     */
    public function getQueryKeys($game, $object, $param)
    {
        if (!$this->loadGame($game)) {
            return $this->error("InvalId game '$object'");
        }
        if (!isset($this->game[$game]['url'][$object])) {
            return $this->error("InvalId object '$object'");
        }
        if (!isset($this->game[$game]['url'][$object][$param])) {
            return $this->error("InvalId param '$param'");
        }
        if (!preg_match_all('/\{([a-zA-Z0-9]+)\}/', $this->game[$game]['url'][$object][$param], $keys)) {
            return true;
        }
        foreach ($keys[1] as $k => $key) {
            if (in_array($key, array('platform', 'platformId'))) {
                unset($keys[1][$k]);
            }
        }

        return $keys[1];
    }

    /**
     * @param string $url
     * @param array|null $post
     * @param string|null $part
     * @return null|array
     */
    private function sendQuery($url, $post = null, $part = null)
    {
        $ch = curl_init($url);
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_USERAGENT => $this->config['useragent'],
                CURLOPT_TIMEOUT => 1,
                CURLOPT_RETURNTRANSFER => true,
            )
        );
        if (!empty($post)) {
            curl_setopt_array(
                $ch,
                array(
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $post,
                )
            );
        }
        $response = curl_exec($ch);
        curl_close($ch);
        if (strpos($response, '<!DOCTYPE html>') !== false) {
            $response = substr($response, strpos($response, 'Surface.globalContext = ') + 24);
            $response = substr($response, 0, strpos($response, '};') + 1);
        }
        $response = @json_decode($response, true, PHP_INT_MAX);
        if (!is_array($response)) {
            return null;
        }
        if (!empty($part) and isset($response[$part])) {
            $response = $response[$part];
        }

        return $response;
    }
}
