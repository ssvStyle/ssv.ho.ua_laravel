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
     * @return bool
     */
    public static function check( $date )
    {
        $pattern = '~^[0-9]{1,2}-[a-zA-Z]{3,9}-[0-9]{4}$~u';

        if ( preg_match_all( $pattern, $date ) ) {

            return true;
        }

        return false;

    }


    /**
     *
     *the correct date to timestamp
     *
     * @param $date
     *
     * @return timestamp
     */
    public static function toTimestamp( $date )
    {
            $res = explode('-', $date );

            return strtotime($res[0] . ' ' . $res[1] . ' ' . $res[2]);

    }



    /**
     * return translate date(month) to ru
     *
     * @param $date|timestamp
     *
     * @return string
     */
    public static function getRusMonth( $date )
    {
        $months = [ 1 => 'Января' ,
                         'Февраля' ,
                         'Марта' ,
                         'Апреля' ,
                         'Мая' ,
                         'Июня' ,
                         'Июля' ,
                         'Августа',
                         'Сентября',
                         'Октября',
                         'Ноября',
                         'Декабря' ];

        return date('j', $date) .' '.$months[date('n', $date)] . ' ' . date('Y', $date) . ' года';

    }

    /**
     *
     * Select only even numbers for a date
     *
     * @param $dateTimestamp
     *
     * @return string Date
     */

    public static function getEvenNumber( $dateTimestamp )
    {

        [$day, $monthNum, $year] = explode('-', date('j-n-Y', $dateTimestamp));

        if (!($day % 2)) {

            $date =  $day .'-'. date('F', mktime(0, 0, 0, $monthNum, 1)) .'-'. $year;

        } else {

            if(!(++$day % 2) && $day < 31){

                $date = $day .'-'. date('F', mktime(0, 0, 0, $monthNum, 1)) .'-'. $year;

            } else {

                $day = 2;
                $monthNum++;

                if ($monthNum > 12) {

                    $monthNum = 1;

                    $year++;

                }

                $date = $day .'-'. date('F', mktime(0, 0, 0, $monthNum, 1)) .'-'. $year;

            }

        }

        return $date;
    }
}