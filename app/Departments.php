<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function cities()
    {
        return $this->belongsTo('App\Cities','city_id');
    }

    public function countries()
    {
        return $this->belongsTo('App\Countries','country_id');
    }

    public function states()
    {
        return $this->belongsTo('App\States','state_id');
    }
}
