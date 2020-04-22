<?php

namespace App\Models;
/**
 * Class Date
 *
 * @package App\Models
 */
abstract class Date
{
    /**
     *
     *checks the correct date
     *
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

    /**
     * return translate date(month) to ru
     *
     * @param $date|timestamp
     *
     * @return string
     */
    public static function rus( $date )
    {
        $months = [ 1 => 'Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря' ];

        return date('j', $date) .' '.$months[date('n', $date)] . ' ' . date('Y', $date) . ' года';

    }
}