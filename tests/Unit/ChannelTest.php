<?php

namespace Tests\Unit;

use App\Channel;
use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_channel_consists_of_threads()
    {
        $channel = factory(Channel::class)->create();
        $thread = factory(Thread::class)->create(['channel_id' => $channel->id]);

        $this->assertTrue($channel->threads->contains($thread));

    }


    /** @test */
    public function a_user_can_view_channel_path()
    {
        $channel = factory(Channel::class)->create();

        $this->get($channel->getPath())->assertOk();
    }
}
