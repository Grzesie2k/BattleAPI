<?php namespace BattleAPI\Tests;

use BattleAPI\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $logger = new Logger('BattleAPI');
        $logger->pushHandler(new StreamHandler('php://stdout'));
        Client::setLogger($logger);
    }
}
