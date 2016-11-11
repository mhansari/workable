<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperianceLevels extends Model
{
     public function jobs()
    {
        return $this->hasMany('App\Jobs', 'experiance_level_id', 'id');
    }
}
