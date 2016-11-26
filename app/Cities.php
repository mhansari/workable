<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JobCities;
use App\Jobs;
class Cities extends Model
{
	public static function all($columns = []) {
    	return parent::all()->sortBy('Name');
  }
   public function jobs()
    {
        return $this->belongsToMany('App\Jobs','job_cities','job_id','id');
    }
}
