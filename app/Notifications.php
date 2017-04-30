<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AdType;
use App\JobType;
use App\ShiftTimings;
use App\ExperianceLevels;
use App\JobCities;
use App\Cities;
class Notifications extends Model
{
    public $primaryKey = 'user_id';

    public function cities()
    {
        return $this->belongsToMany('App\Cities','city_id');
    }

    public function countries()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories','category_id');
    }
    public function shift_timings()
    {
        return $this->belongsTo('App\States','state_id');
    }
}
