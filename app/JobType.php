<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    //
    protected $table = "job_type";
     public function jobs()
    {
        return $this->hasMany('App\Jobs', 'job_type_id', 'id');
    }
}
