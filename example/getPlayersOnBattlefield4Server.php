<?php

use BattleAPI\Game\BF4\Server as BF4Server;
use BattleAPI\Game\Platform;
use BattleAPI\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';

// Configuration
$serverId = '475410eb-0ff0-4142-b4d8-c8e7030be82d';
$platform = new Platform(Platform::PC);

// Add logger (optional)
$logger = new Logger('BattleAPI');
$logger->pushHandler(new StreamHandler('php://stdout'));
Client::setLogger($logger);

// Create Battlefield server object
$server = new BF4Server($serverId, $platform);

// Send query to Battlelog
$serverPlayers = $server->getPlayers();

// Print results
print_r($serverPlayers);
