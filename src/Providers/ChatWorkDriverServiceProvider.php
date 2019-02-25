<?php

namespace Revolution\BotMan\Drivers\ChatWork\Providers;

use Illuminate\Support\ServiceProvider;

class ChatWorkDriverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../stubs/chatwork.php' => config_path('botman/chatwork.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
