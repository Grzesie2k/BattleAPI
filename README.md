# BattleAPI - Battlelog API in PHP

[![Total Downloads](https://img.shields.io/packagist/dt/Grzesie2k/BattleAPI.svg)](https://packagist.org/packages/Grzesie2k/BattleAPI)
[![Latest Stable Version](https://img.shields.io/packagist/v/Grzesie2k/BattleAPI.svg)](https://packagist.org/packages/Grzesie2k/BattleAPI)

## Installation

Install the latest version with:

```bash
$ composer require grzesie2k/battleapi
```

## Example
###Source
Download information about players connected the server:
```php
<?php

use BattleAPI\Game\BF4\Server as BF4Server;
use BattleAPI\Game\Platform;

require 'vendor/autoload.php';

// Configuration
$serverId = '27a523ab-9e51-4eaa-9326-c4e6504841f1';
$platform = new Platform(Platform::PC);

// Create Battlefield server object
$server = new BF4Server($serverId, $platform);

// Send query to Battlelog
$serverPlayers = $server->getPlayers();

// Print results
print_r($serverPlayers);
```

## About

### Supported games
- Battlefield 3
- Battlefield 4
- Medal of Honor: Warfighter

### Requirements

- BattleAPI works with PHP 5.4 or above and enabled cURL extension.

### License

BattleAPI is licensed under the MIT License - see the `LICENSE` file for details.
