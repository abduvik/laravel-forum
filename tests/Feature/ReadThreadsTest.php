<?php

namespace Tests\Feature;

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

        $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);

        $this->get('/threads/' . $this->thread->id)
            ->assertSee($reply->body);
    }

}
