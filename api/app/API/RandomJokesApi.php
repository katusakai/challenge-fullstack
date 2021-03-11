<?php


namespace App\API;


class RandomJokesApi
{
    public static function get()
    {
        $json = file_get_contents('http://api.icndb.com/jokes/random');
        return json_decode($json)->value->joke;
    }
}