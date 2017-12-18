<?php

return [

    /*
    |--------------------------------------------------------------------------
    | ChatWork token
    |--------------------------------------------------------------------------
    |
    */

    /**
     * https://www.chatwork.com/service/packages/chatwork/subpackages/api/token.php
     */
    'api_token'             => env('CHATWORK_API_TOKEN'),

    /**
     * Create 2 webhooks. Account event and Room event.
     * https://www.chatwork.com/service/packages/chatwork/subpackages/webhook/list.php
     */
    'webhook_room_token'    => env('CHATWORK_WEBHOOK_ROOM_TOKEN'),
    'webhook_account_token' => env('CHATWORK_WEBHOOK_ACCOUNT_TOKEN'),
];
