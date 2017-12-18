<?php

namespace Revolution\BotMan\Drivers\ChatWork;

class ChatWorkAccountDriver extends ChatWorkRoomDriver
{
    const DRIVER_NAME = 'ChatWorkAccount';

    const EVENT_TYPE = 'mention_to_me';

    const TOKEN_TYPE = 'webhook_account_token';

    const ACCOUNT_ID = 'from_account_id';
}
