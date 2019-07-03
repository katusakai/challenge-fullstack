<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;
use App\API\RandomJokesApi;


$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,15),
        'text' => RandomJokesApi::get(),
    ];
});
