<?php


namespace App\Helpers;


use App\User;

class UserId
{
    public static function list()
    {
        $usersIdList = [];
        foreach (User::all() as $user) {
            $usersIdList[] = $user->id;
        }
        return $usersIdList;
    }
}