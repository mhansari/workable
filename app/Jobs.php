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

    public function countries()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function companies()
    {
        return $this->belongsTo('App\CompanyInfo','user_id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories','category_id');
    }
    public function benefits()
    {
        return $this->belongsToMany('App\Benefits','job_benefits','job_id','benefit_id');
    }

    public function applications()
    {
        return $this->belongsToMany('App\SiteUsers','applied','job_id','user_id');
    }

    public function users()
    {
        return $this->belongsTo('App\SiteUsers','user_id');
    }
    public function careerlevel()
    {
        return $this->belongsTo('App\CareerLevels','career_level_id');
    }
    public function experiancelevel()
    {
        return $this->belongsTo('App\ExperianceLevels','experiance_level_id');
    }
    public function shift_timings()
    {
        return $this->belongsTo('App\ShiftTimings','shift_timings_id');
    }
}
