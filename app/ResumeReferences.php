<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeReferences extends Model
{
    protected $table = "resume_references";
    public function country()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function referencetype()
    {
        return $this->belongsTo('App\ReferenceType','reference_type_id');
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
