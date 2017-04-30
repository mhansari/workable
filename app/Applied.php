<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Countries;
use App\Cities;
class Applied extends Model
{
	protected $table = "applied";
	public function jobs()
    {
        return $this->belongsTo('App\Jobs','job_id');
    }
    
    public function status()
    {
        return $this->belongsTo('App\ApplicationStatus','status_id');
    }

    public function personal_info()
    {
    	return $this->hasMany('App\ResumeSeekerProfile','resume_id','resume_id');
    }
    public function education()
    {
    	return $this->hasMany('App\ResumeAcademics','resume_id','resume_id');
    }
    public function experiance()
    {
    	return $this->hasMany('App\ResumeExperiances','resume_id','resume_id');
    }

    public static function getYears($start, $end)
    {
    	$start_date_arr = explode(",", $start);
    	usort($start_date_arr, function($a, $b) {
		    $dateTimestamp1 = strtotime($a);
		    $dateTimestamp2 = strtotime($b);

		    return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
		});
		$end_date_arr = explode(",", $end);
    	usort($end_date_arr, function($a, $b) {
		    $dateTimestamp1 = strtotime($a);
		    $dateTimestamp2 = strtotime($b);

		    return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
		});
		$years = \Carbon\Carbon::createFromDate(date("Y",strtotime($start_date_arr[0])), date("m",strtotime($start_date_arr[0])), date("d",strtotime($start_date_arr[0])))->diff(\Carbon\Carbon::create(date("Y",strtotime($end_date_arr[count($end_date_arr) - 1])), date("m",strtotime($end_date_arr[count($end_date_arr) - 1])), date("d",strtotime($end_date_arr[count($end_date_arr) - 1]))))->format('%y');

		if($years>1)
			return $years . ' Years';
		elseif($years==1)
			return $years . ' Year';
		else
			return 'Fresh Graduate';

    }
}
