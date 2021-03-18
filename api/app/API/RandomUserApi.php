<?php


namespace App\API;


class RandomUserApi
{
    public static function get()
    {
        $json = file_get_contents('https://randomuser.me/api/');
        return json_decode($json)->results[0];
    }
}