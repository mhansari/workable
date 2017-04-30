<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPrivacySettings extends Model
{
    protected $table = "user_privacy_settings";

    public function options()
    {
    	return $this->hasMany('App\PrivacyOptions','id','privacy_settings_id');
    }
    
}
