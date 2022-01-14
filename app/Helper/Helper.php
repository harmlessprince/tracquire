<?php

namespace App\Helper;

use Illuminate\Support\Str;

class Helper
{

    public static function refCodeGenerator(): string
    {
        return str_shuffle(strtoupper(substr(strtotime(now()), 8) . substr(Str::random(6), -4)));
    }


}

