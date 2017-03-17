<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
  public function applications()
    {
    	return $this->hasMany('App\Applied','resume_id','id');
       // return $this->belongsTo('App\Applied','resume_id');
    }
}
