<?php
/**
 * Created by PhpStorm.
 * User: Katu
 * Date: 2019-06-13
 * Time: 13:26
 */

namespace App\Helpers;


class RandomEdited
{
    public function edited($daysBefore)
    {
        $randomNumber = rand(0,100);
        if ($randomNumber > 70){
            $randomDate = new RandomDate();
            return $randomDate->get($daysBefore);
        } else{
            return NULL;
        }
    }
}