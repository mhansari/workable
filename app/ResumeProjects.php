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
   public function experiances()
    {
        return $this->belongsTo('App\ResumeExperiances','company_id');
    }
    
}
