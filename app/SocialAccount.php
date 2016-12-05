<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['first_name','email','user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(\App\SiteUsers::class);
    }
}

?>