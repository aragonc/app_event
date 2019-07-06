<?php

use App\Setting;

function setting($variable){
    $setting = Setting::where('variable', $variable)->get();
    $value = $setting->toArray();

    return $value[0]['value'];
}