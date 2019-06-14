<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Channel;
use App\Model;
use App\Thread;
use App\User;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
        'channel_id' => static function () {
            return factory(Channel::class)->create()->id;
        },
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});