<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Countries;
use App\Cities;
class SavedJobs extends Model
{
	protected $table = "saved_jobs";
	public function jobs()
    {
        return $this->belongsTo('App\Jobs','job_id');
    }
}
