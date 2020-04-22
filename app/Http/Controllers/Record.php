<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Time;
use App\Models\Servises;

class Record extends Controller
{
    /**
     * Shows the recording time for a given date
     *
     * @param string $date
     *
     * @return View
     *
     */
    public function showTime($date = '')
    {
        $date = $date ?: date('j-F-Y');

        $dateTimeStamp = Date::check($date);

        if ($dateTimeStamp) {

            $sql = 'SELECT 
`record`.`id`, `date`, `user`.`name` AS `userName`, `phone` AS `userPhone`, `time`.`time`, `servise`.`name` AS `servise`, `servise`.`name` AS `addSevise`, `status`.`name` AS `status`
FROM `record` 
LEFT JOIN `user` ON `record`.`user_id`=`user`.`id` 
LEFT JOIN `servise` ON `record`.`servise_id`=`servise`.`id`
LEFT JOIN `servise` AS `addSevise` ON `record`.`add_servise_id`=`servise`.`id`
LEFT JOIN `time` ON `record`.`time`=`time`.`id`
LEFT JOIN `status` ON `record`.`status_id`=`status`.`id`';




            return view('record')
                ->with('day' , Time::all())
                ->with('servises', Servises::all())
                ->with('date', Date::rus($dateTimeStamp));

        }

        return view('record')->with('error', 'Invalid date!');

    }
}
