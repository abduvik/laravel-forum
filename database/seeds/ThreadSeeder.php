<?php

use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::all();

        $users->each(static function ($user) {
            factory(\App\Thread::class, 2)->create(['user_id' => $user->id]);
        });
    }
}
