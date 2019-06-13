<?php
/**
 * Created by PhpStorm.
 * User: Katu
 * Date: 2019-06-13
 * Time: 14:36
 */

namespace App\API;


class RandomJokesApi
{
    public static function get()
    {
        $json = file_get_contents('http://api.icndb.com/jokes/random');
        return json_decode($json)->value->joke;
    }
}