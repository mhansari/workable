<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cities;
class JobBenefits extends Model
{
	protected $table = "job_benefits";
	public static  function checkBenefit($benefit_id,$id)
	{
		$jc = \App\JobBenefits::select('benefit_id')->where('job_id', $id)->get();
		$v = false;
		foreach($jc as $o)
		{
			if($o->benefit_id == $benefit_id)
			{
				$v = true;
				//exit;
			}
		}
		return $v;
	}
    
}
