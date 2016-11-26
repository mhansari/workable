<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeLanguages extends Model
{
    protected $table = "resume_languages";
    public function language()
    {
        return $this->belongsTo('App\Languages','language_id');
    }

    public function proficiencylevel()
    {
        return $this->belongsTo('App\ProficiencyLevels','proficiency_level_id');
    }
   
}
