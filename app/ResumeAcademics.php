<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeAcademics extends Model
{
    protected $table = "resume_academics";
    public function degreelevel()
    {
        return $this->belongsTo('App\DegreeLevels','degree_level_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Cities','city_id');
    }
}
