<?php

namespace Tests;

use Mockery as m;
use BotMan\BotMan\Http\Curl;
use PHPUnit\Framework\TestCase;
use Revolution\BotMan\Drivers\ChatWork\ChatWorkRoomDriver;
use Symfony\Component\HttpFoundation\Request;

class ChatWorkRoomDriverTest extends TestCase
{
    private function getDriver($responseData, $htmlInterface = null)
    {
        $request = m::mock(Request::class.'[getContent]');
        $request->shouldReceive('getContent')->andReturn(json_encode($responseData));
        if ($htmlInterface === null) {
            $htmlInterface = m::mock(Curl::class);
        }

        return new ChatWorkRoomDriver($request, [], $htmlInterface);
    }

    /** @test */
    public function it_returns_the_driver_name()
    {
        $driver = $this->getDriver([]);
        $this->assertSame('ChatWorkRoom', $driver->getName());
    }
}
