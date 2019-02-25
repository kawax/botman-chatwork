# BotMan driver for ChatWork

ChatWork用のBotManドライバー。  
https://go.chatwork.com/  
https://botman.io/  

## Requirements
- PHP >= 7.1
- Laravel >= 5.5

## Demo
- https://www.chatwork.com/g/botman
- https://github.com/kawax/botman-chatwork-project
- https://botman.kawax.biz/

## Installation

### BotMan Studio
Create new project by BotMan Studio  
https://botman.io/2.0/botman-studio  
https://github.com/botman/studio  

### Composer
```
composer require revolution/botman-chatwork
```

### config/botman/chatwork.php
```bash
php artisan vendor:publish --provider="Revolution\BotMan\Drivers\ChatWork\Providers\ChatWorkDriverServiceProvider"
```

### .env
```bash
CHATWORK_API_TOKEN=
CHATWORK_WEBHOOK_ROOM_TOKEN=
CHATWORK_WEBHOOK_ACCOUNT_TOKEN=
```

### app/Providers/BotMan/DriverServiceProvider.php

Set ChatWorkRoomDriver or ChatWorkAccountDriver or both.  
ここで設定したドライバーが有効化される。

```php
<?php

namespace App\Providers\BotMan;

use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Studio\Providers\DriverServiceProvider as ServiceProvider;

use Revolution\BotMan\Drivers\ChatWork\ChatWorkRoomDriver;
use Revolution\BotMan\Drivers\ChatWork\ChatWorkAccountDriver;

class DriverServiceProvider extends ServiceProvider
{
    /**
     * The drivers that should be loaded to
     * use with BotMan
     *
     * @var array
     */
    protected $drivers = [
        //        ChatWorkRoomDriver::class,
        ChatWorkAccountDriver::class,
    ];

    /**
     * @return void
     */
    public function boot()
    {
        parent::boot();

        foreach ($this->drivers as $driver) {
            DriverManager::loadDriver($driver);
        }
    }
}
```

## Webhook
`アカウントイベント` と `ルームイベント` 用にWebhookを2つ作成する。  
https://www.chatwork.com/service/packages/chatwork/subpackages/api/token.php

- アカウントイベントは `ご自身へのメンション` をチェック。
- ルームイベントは `メッセージ作成` をチェック。更新は非対応。ルームIDも入力。

どちらもトークンを `.env` で設定。

## APIトークン
メッセージの投稿に必要なAPIトークン。
https://www.chatwork.com/service/packages/chatwork/subpackages/api/token.php

### Use another API Token

```php
$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!', ['api_token' => '...']);
});
```

```php
$botman->say('say()', 'Room ID', ChatWorkAccountDriver::class, ['api_token' => '...']);
```

## Supported Features
Basic hears-reply only.



## LICENSE
MIT  
Copyright kawax
