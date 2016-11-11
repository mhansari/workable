<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftTimings extends Model
{
     public function jobs()
    {
        return $this->hasMany('App\Jobs', 'shift_timings_id', 'id');
    }
}
