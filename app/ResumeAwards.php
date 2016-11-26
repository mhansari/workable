<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeAwards extends Model
{
    protected $table = "resume_awards";
    public function portfolio_award_types()
    {
        return $this->belongsTo('App\PortfolioAwardsType','project_award_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function state()
    {
        return $this->belongsTo('App\States','state_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Cities','city_id');
    }
}
