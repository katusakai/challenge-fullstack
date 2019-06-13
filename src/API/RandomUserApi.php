<?php
/**
 * Created by PhpStorm.
 * User: Katu
 * Date: 2019-06-13
 * Time: 14:07
 */

namespace App\API;


class RandomUserApi
{
    public static function get()
    {
        $json = file_get_contents('https://randomuser.me/api/');
        return json_decode($json)->results[0];
    }
}