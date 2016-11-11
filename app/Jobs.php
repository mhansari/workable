<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdType;
use App\JobType;
use App\ShiftTimings;
use App\ExperianceLevels;
use App\JobCities;
use App\Cities;
class Jobs extends Model
{
    public function adtype()
    {
        return $this->belongsTo('App\AdType','ad_type_id');
    }
	public function jobtype()
    {
        return $this->belongsTo('App\JobType','job_type_id');
    }

    public function shift()
    {
        return $this->belongsTo('App\ShiftTimings','shift_timings_id');
    }
    public function experiance()
    {
        return $this->belongsTo('App\ExperianceLevels','experiance_level_id');
    }
   public function cities()
    {
        return $this->belongsToMany('App\Cities','job_cities','job_id','city_id');
    }
}
