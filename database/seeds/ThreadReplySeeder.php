<?php

use App\Reply;
use App\User;
use Illuminate\Database\Seeder;

class ThreadReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $threads = \App\Thread::all();
        $users = User::all();

        $usersCount = count($users);

        $threads->each(static function ($thread) use ($usersCount) {
            factory(Reply::class, 10)->create([
                    'thread_id' => $thread->id,
                    'user_id' => mt_rand(1, $usersCount)
                ]
            );
        });
    }
}
