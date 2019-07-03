<?php


namespace App\Helpers;


class RandomDate
{
    public static function created($daysBefore)
    {
        $rand = rand(0, 3600 * 24 * $daysBefore);
        $time = time() - $rand;
        $date = date( 'Y-m-d H:i', $time);

        return(new \DateTime($date));
    }

    public static function updated($daysBefore)
    {
        $randomNumber = rand(0,100);
        if ($randomNumber > 70){
            return static::created($daysBefore);
        } else{
            return NULL;
        }
    }
}