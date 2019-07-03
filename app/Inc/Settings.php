<?php
/**
 * Created by PhpStorm.
 * User: aragonc
 * Date: 03/07/19
 * Time: 01:57 PM
 */

namespace App\Inc;


class Settings
{
    public function getSetting($array, $variable){
        foreach ($array as $key => $value){
            return $key;
        }
    }
}