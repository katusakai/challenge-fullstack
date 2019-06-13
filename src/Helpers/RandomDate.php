<?php
/**
 * Created by PhpStorm.
 * User: Katu
 * Date: 2019-06-13
 * Time: 12:02
 */

namespace App\Helpers;


class RandomDate
{
    public function get($daysBefore)
    {
        $rand = rand(0, 3600 * 24 * $daysBefore);
        $time = time() - $rand;
        $date = date( 'Y-m-d H:i', $time);

        return(new \DateTime($date));
    }
}