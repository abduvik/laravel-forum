<?php

namespace Tests\Feature;

use App\Channel;
use App\Reply;
use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ReadThreadsTest
 * @package Tests\Feature
 * @property Thread $thread
 */
class ReadThreadsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
    }


    use DatabaseMigrations;

    /** @test * */
    public function a_user_can_browse_threads(): void
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function thread_title_exists_when_a_new_thread_is_created(): void
    {

        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function single_thread_title_exists_on_single_page(): void
    {

        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }


    /** @test */
    public function a_user_can_filter_threads_according_to_a_tag()
    {
        $channel = factory(Channel::class)->create();
        $threadInChannel = factory(Thread::class)->create(['channel_id' => $channel->id]);

        $threadNotInChannel = factory(Thread::class)->create();

        $this->get($channel->getPath())
            ->assertSee($threadInChannel->title)
            ->assertDontSee($threadNotInChannel->title);

    }

}
