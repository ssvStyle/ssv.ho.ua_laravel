<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';
    protected $fillable = [
        'date',
        'time',
        'user_id',
        'servise_id',
        'add_servise_id',
        'status_id',
    ];
}
