<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Countries;
use App\Cities;
class Conversation extends Model
{
	protected $table = "conversation";
	
	static function newMsgCount($uid)
	{
		$count = Conversation::where('to',$uid)->where('seen',0)->count();
		return $count;
	}

	public function to()
   {
        return $this->hasMany('App\User', 'id', 'to');
    }

    public function from()
   {
        return $this->hasMany('App\User', 'id', 'from');
    }
}
