<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Countries;
use App\Cities;
class ApplicationStatus extends Model
{
	protected $table = "application_status";
	public function applications()
    {
    	return $this->hasMany('App\Applied','status_id','id');
    }
}
