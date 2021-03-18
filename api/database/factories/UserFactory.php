<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\API\RandomUserApi;
use App\User;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function () {

    $userApi = RandomUserApi::get();

    return [
        'name' => ucfirst($userApi->name->first) . ' ' . ucfirst($userApi->name->last),
        'email' => Str::random(1) . $userApi->email,
        'password' => bcrypt('password'),
        'avatar' => $userApi->picture->medium,
        'avatar_original' => $userApi->picture->large,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
