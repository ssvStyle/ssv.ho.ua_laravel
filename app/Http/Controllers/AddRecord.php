<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;

class AddRecord extends Controller
{
    public function showTime($date)
    {
        var_dump(Date::check($date));
    }
}
