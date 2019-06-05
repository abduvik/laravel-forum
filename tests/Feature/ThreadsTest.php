<?php

namespace Tests\Feature;

use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsTest extends TestCase
{

    use DatabaseMigrations;

    /** @test **/
    public function a_user_can_browse_threads()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }

    /** @test */
    public function thread_title_exists_when_a_new_thread_is_created()
    {
        $thread = factory(Thread::class)->create();

        $response = $this->get('/threads');

        $response->assertSee($thread->title);
    }

    /** @test */
    public function single_thread_title_exists_on_single_page()
    {
        $thread = factory(Thread::class)->create();

        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);
    }
}
