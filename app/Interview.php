<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $table = "interview";
    
    public function jobs()
    {
    	return $this->belongsTo('App\Jobs', 'job_id');
    }
    public function vanue()
    {
    	return $this->belongsTo('App\Vanues', 'vanue_id');
    }
    public function applications()
    {
    	return $this->belongsTo('App\Applied', 'application_id');
    }
   
}
