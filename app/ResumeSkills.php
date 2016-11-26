<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeSkills extends Model
{
    protected $table = "resume_skills";
    public function skilllevel()
    {
        return $this->belongsTo('App\SkillLevels','skill_level_id');
    }
   
}
