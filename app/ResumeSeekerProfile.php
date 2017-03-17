<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeSeekerProfile extends Model
{
    protected $table = "resume_seeker_profile";

    public function MaritalStatus()
    {
        return $this->belongsTo('App\MaritalStatus','marital_status_id');
    }
public function getFullNameAttribute()
{
    return $this->first_name . " " . $this->last_name;
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

	public function industry()
    {
        return $this->belongsTo('App\Categories','industry_id');
    }  

    public function ExperianceLevel()
    {
        return $this->belongsTo('App\ExperianceLevels','experiance_level_id');
    }

    public function CurrentSalaryCurrency()
    {
        return $this->belongsTo('App\SalaryCurrency','current_salary_currency_id');
    }

    public function ExpectedSalaryCurrency()
    {
        return $this->belongsTo('App\SalaryCurrency','expected_salary_currency_id');
    }   
    
    public function education()
    {
        return $this->hasMany('App\ResumeAcademics','resume_id','resume_id');
    } 
    public function experiance()
    {
        return $this->hasMany('App\ResumeExperiances','resume_id','resume_id');
    }
    public function projects()
    {
        return $this->hasMany('App\ResumeProjects','resume_id','resume_id');
    }

    public function languages()
    {
        return $this->hasMany('App\ResumeLanguages','resume_id','resume_id');
    }
    public function skills()
    {
        return $this->hasMany('App\ResumeSkills','resume_id','resume_id');
    }
    public function certifications()
    {
        return $this->hasMany('App\ResumeCertifications','resume_id','resume_id');
    }
    public function references()
    {
        return $this->hasMany('App\ResumeReferences','resume_id','resume_id');
    }
    public function publications()
    {
        return $this->hasMany('App\ResumePublications','resume_id','resume_id');
    }
    public function affilitions()
    {
        return $this->hasMany('App\ResumeAffiliations','resume_id','resume_id');
    }
    public function awards()
    {
        return $this->hasMany('App\ResumeAwards','resume_id','resume_id');
    }
    public function resume()
    {
        return $this->hasMany('App\Resume','id','resume_id');
    }
}
