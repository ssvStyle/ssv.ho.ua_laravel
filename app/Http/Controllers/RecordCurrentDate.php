<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\View\View;

class RecordCurrentDate extends Record
{
    /**
     * @return View vs current date
     *
     */
    public function getTime()
    {

        return parent::showTime(Date::toTimestamp( date('j-F-Y') ), '');

    }

}
