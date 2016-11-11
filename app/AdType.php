<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdType extends Model
{
    public function jobs()
    {
        return $this->hasMany('App\Jobs', 'ad_type_id', 'id');
    }
}
