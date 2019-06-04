<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Thread;
use App\Reply;
use App\User;
use Faker\Generator as Faker;


$factory->define(Reply::class, function (Faker $faker) {
    return [
        'thread_id' => static function () {
            return factory(Thread::class)->create()->id;
        },
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
        'body' => $faker->paragraph
    ];
});