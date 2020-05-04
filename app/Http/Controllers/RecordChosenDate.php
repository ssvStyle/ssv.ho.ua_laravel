<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;

class RecordChosenDate extends Record
{
    /**
     * Shows the recording time for a given date
     *
     * @param string $date
     *
     * @return View
     *
     */
    public function getTime( $date )
    {
        $date = $date ?: date('j-F-Y');
        $error = '';

        $dateCondition =  (!Date::check( $date ) ||  Date::toTimestamp( $date ) < strtotime("now"));

        if ( $dateCondition ) {

            $date = date('j-F-Y');
            $error = 'Некорректная дата!';

        }

        return parent::showTime( Date::toTimestamp( $date ), $error );

    }
}
