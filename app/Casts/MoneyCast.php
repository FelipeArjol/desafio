<?php

namespace App\Casts;

use App\Shared\DateManipulation;
use App\Shared\Money;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MoneyCast implements CastsAttributes
{

    public function get($model, $key, $value, $attributes)
    {
        return $value ? Money::centsToStr($value) : null;;
    }

    public function set($model, $key, $value, $attributes)
    {
        return $value && strlen($value) > 0 ? Money::strToCents($value) : null;
    }
}
