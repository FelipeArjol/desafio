<?php

namespace App\Shared;

class Money
{
    public static function format($value)
    {
        return number_format($value, 2, ',', '.');
    }

    /*
        RECEBE UMA STRING
        RETORNA DOUBLE
    */
    public static function strToCents($string)
    {
        $numbers = explode(".", str_replace(",", ".", preg_replace("/[^0-9-,.]/", "", $string)));
        $return = '';
        if (count($numbers) !== 1) {
            for ($i = 0; $i < count($numbers); $i++) {
                if (($i + 1) == count($numbers)) {
                    $return .= '.' . $numbers[$i];
                } else {
                    $return .= $numbers[$i];
                }
            }
        } elseif (!empty($numbers)) {
            $return = $numbers[0];
        }
        //round((float) $return, 2)
        return (is_numeric($return)) ? $return * 100 : 0;
    }

    public static function floatToStr($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public static function centsToStr($value)
    {
        return number_format($value / 100, 2, ',', '.');
    }
}
