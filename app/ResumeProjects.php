<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeProjects extends Model
{
    protected $table = "resume_projects";
    public function projecttype()
    {
        return $this->belongsTo('App\ProjectType','project_type_id');
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
