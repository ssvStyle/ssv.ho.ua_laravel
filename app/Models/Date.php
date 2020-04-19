<?php

namespace App\Models;
/**
 * Class CheckDate
 *
 * @package App\Models
 */
abstract class Date
{
    /**
     * @param $date
     *
     * @return bool|string
     */
    public static function check( $date )
    {
        $pattern = '~^[0-9]{1,2}-[a-zA-Z]{3,9}-[0-9]{4}$~u';

        if (preg_match_all( $pattern, $date )) {

            $res = explode('-', $date );

            return strtotime($res[0] . ' ' . $res[1] . ' ' . $res[2]);
        }

        return false;

    }
}