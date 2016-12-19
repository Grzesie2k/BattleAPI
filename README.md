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
File: example/playersOnBattlefield4Server.php
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
###Output:
```
{
  "players": [
    {
      "personaId": "373010991",
      "persona": {
        "picture": "",
        "userId": "2832665149537988234",
        "user": {
          "username": "Cpt_Corona",
          "gravatarMd5": "991f797cb3a76e59403ce61b59761c48",
          "userId": "2832665149537988234",
          "createdAt": 1322264056,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "373010991"
            },
            "isOnline": true,
            "userId": "2832665149537988234",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                4194304,
                0,
                524288
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "XP3_MarketPl",
              "personaId": "373010991",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187705,
            "isPlaying": true,
            "presenceStates": "65801"
          }
        },
        "updatedAt": 1383980383,
        "firstPartyId": "",
        "personaId": "373010991",
        "personaName": "Cpt_Corona",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"2050\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "280728471",
      "persona": {
        "picture": "",
        "userId": "2832660534562895983",
        "user": {
          "username": "Drew-kun",
          "gravatarMd5": "1713b32c1feaa7e4a7e291340617acfc",
          "userId": "2832660534562895983",
          "createdAt": 1319591052,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "280728471"
            },
            "isOnline": true,
            "userId": "2832660534562895983",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                4194304,
                0,
                524288
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "XP3_MarketPl",
              "personaId": "280728471",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187705,
            "isPlaying": true,
            "presenceStates": "65801"
          }
        },
        "updatedAt": 1422803282,
        "firstPartyId": "",
        "personaId": "280728471",
        "personaName": "Drew-kun",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"6146\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "785392852",
      "persona": {
        "picture": "",
        "userId": "2832657341859752307",
        "user": {
          "username": "-bZ-Lux",
          "gravatarMd5": "d41d8cd98f00b204e9800998ecf8427e",
          "userId": "2832657341859752307",
          "createdAt": 1346956617,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "785392852"
            },
            "isOnline": true,
            "userId": "2832657341859752307",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                4194304,
                0,
                524288
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "XP3_MarketPl",
              "personaId": "785392852",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187704,
            "isPlaying": true,
            "presenceStates": "65801"
          }
        },
        "updatedAt": 1385765476,
        "firstPartyId": "",
        "personaId": "785392852",
        "personaName": "-bZ-Lux",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"6146\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "895489912",
      "persona": {
        "picture": "",
        "userId": "2832664002681518683",
        "user": {
          "username": "cannonkil1",
          "gravatarMd5": "",
          "userId": "2832664002681518683",
          "createdAt": 1374513924,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "895489912"
            },
            "isOnline": true,
            "userId": "2832664002681518683",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                524288,
                0,
                4194304
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "XP0_Metro",
              "personaId": "895489912",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187706,
            "isPlaying": true,
            "presenceStates": "65801"
          }
        },
        "updatedAt": 1423602300,
        "firstPartyId": "",
        "personaId": "895489912",
        "personaName": "cannonkil1",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"2050\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "356225769",
      "persona": {
        "picture": "",
        "userId": "2832658994809458719",
        "user": {
          "username": "blimptv",
          "gravatarMd5": "48ccf916fb0a82c7dc54fc059976fb73",
          "userId": "2832658994809458719",
          "createdAt": 1319504376,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "356225769"
            },
            "isOnline": true,
            "userId": "2832658994809458719",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                524288,
                0,
                4194304
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "XP0_Metro",
              "personaId": "356225769",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187770,
            "isPlaying": true,
            "presenceStates": "65801"
          }
        },
        "updatedAt": 1444705675,
        "firstPartyId": "",
        "personaId": "356225769",
        "personaName": "blimptv",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"3074\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "1792036759",
      "persona": {
        "picture": "",
        "userId": "2955061311887543527",
        "user": {
          "username": "yabbamyiciin",
          "gravatarMd5": "713915815ab3939efb72faf94057eff1",
          "userId": "2955061311887543527",
          "createdAt": 1470283371,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "1792036759"
            },
            "isOnline": true,
            "userId": "2955061311887543527",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                524288,
                0,
                4194304
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "XP0_Metro",
              "personaId": "1792036759",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187989,
            "isPlaying": true,
            "presenceStates": "65801"
          }
        },
        "updatedAt": 1480916348,
        "firstPartyId": "",
        "personaId": "1792036759",
        "personaName": "yabbamyiciin",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"2048\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "369440745",
      "persona": {
        "picture": "",
        "userId": "2832659789451539143",
        "user": {
          "username": "SGT_Dingman",
          "gravatarMd5": "f47516b921c61a42fc30dbb88d407757",
          "userId": "2832659789451539143",
          "createdAt": 1320973686,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "369440745"
            },
            "isOnline": true,
            "userId": "2832659789451539143",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                0,
                524288,
                4194304
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "MP_Prison",
              "personaId": "369440745",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482187869,
            "isPlaying": true,
            "presenceStates": "265"
          }
        },
        "updatedAt": 1467326441,
        "firstPartyId": "",
        "personaId": "369440745",
        "personaName": "SGT_Dingman",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"2054\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "349685134",
      "persona": {
        "picture": "",
        "userId": "2832660143716702690",
        "user": {
          "username": "Slowalker8",
          "gravatarMd5": "8676b35d0d6c15feb878b154fb66bf86",
          "userId": "2832660143716702690",
          "createdAt": 1319549609,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "349685134"
            },
            "isOnline": true,
            "userId": "2832660143716702690",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                0,
                524288,
                4194304
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "MP_Prison",
              "personaId": "349685134",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482188171,
            "isPlaying": true,
            "presenceStates": "265"
          }
        },
        "updatedAt": 1423796921,
        "firstPartyId": "",
        "personaId": "349685134",
        "personaName": "Slowalker8",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"2050\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    },
    {
      "personaId": "935931654",
      "persona": {
        "picture": "",
        "userId": "2955057441136763682",
        "user": {
          "username": "WalkingBoss1",
          "gravatarMd5": null,
          "userId": "2955057441136763682",
          "createdAt": 1384828809,
          "presence": {
            "onlineGame": {
              "platform": 1,
              "game": 2048,
              "personaId": "935931654"
            },
            "isOnline": true,
            "userId": "2955057441136763682",
            "playingMp": {
              "gameId": "18014398523756761",
              "gameExpansions": [
                0,
                524288,
                4194304
              ],
              "gameMode": "64",
              "serverGuid": "475410eb-0ff0-4142-b4d8-c8e7030be82d",
              "game": 2048,
              "levelName": "MP_Prison",
              "personaId": "935931654",
              "serverName": "BanZore.com 24\/7 HC Metro\/Op Lock\/Pearl Market #1200 TKT #50hz#",
              "experience": 0,
              "platform": 1,
              "role": 1
            },
            "updatedAt": 1482188131,
            "isPlaying": true,
            "presenceStates": "265"
          }
        },
        "updatedAt": 1430523109,
        "firstPartyId": "",
        "personaId": "935931654",
        "personaName": "WalkingBoss1",
        "gamesLegacy": "0",
        "namespace": "cem_ea_id",
        "gamesJson": "{\"1\":\"2054\"}",
        "games": {},
        "clanTag": ""
      },
      "platform": 1,
      "game": 2048,
      "gameId": "18014398523756761",
      "guid": "475410eb-0ff0-4142-b4d8-c8e7030be82d"
    }
  ]
}
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
