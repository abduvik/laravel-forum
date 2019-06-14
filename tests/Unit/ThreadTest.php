<?php

namespace Tests\Unit;

use App\Channel;
use App\Thread;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ThreadTest
 * @package Tests\Unit
 * @property Thread $thread
 */
class ThreadTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->thread = create(Thread::class);
    }

    use DatabaseMigrations;


    /** @test */
    public function a_thread_can_make_a_string_path()
    {
        $this->assertEquals('/threads/' . $this->thread->channel->slug . '/' . $this->thread->id, $this->thread->path());
    }

    /** @test */
    public function a_thread_has_replies()
    {

        $this->assertInstanceOf(Collection::class, $this->thread->replies);
    }

    /** @test */
    public function a_thread_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->thread->creator);

    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'Lorem',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel()
    {
        $this->assertInstanceOf(Channel::class, $this->thread->channel);
    }
}
