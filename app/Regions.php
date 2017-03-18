<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
  public function country()
  {
  	return $this->belongsTo('App\Countries','region_id');
  }
}
