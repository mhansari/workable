<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumePublications extends Model
{
    protected $table = "resume_publications";
    public function country()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function publicationtype()
    {
        return $this->belongsTo('App\PublicationType','publication_type_id');
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
