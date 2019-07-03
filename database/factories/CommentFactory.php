<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use App\API\RandomJokesApi;
use App\Helpers\UserId;
use App\Helpers\RandomDate;


$factory->define(Comment::class, function () {
    return [
        'user_id' => UserId::list()[array_rand(UserId::list())],
        'text' => RandomJokesApi::get(),
        'created_at' => RandomDate::created(5),
        'updated_at' => RandomDate::updated(2),
    ];
});
