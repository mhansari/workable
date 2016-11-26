<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Countries;
use App\Cities;
class CompanyInfo extends Model
{
	protected $table = "company_info";
	public $primaryKey = 'user_id';
    public function country()
    {
        return $this->belongsTo('App\Countries','country_id');
    }
    public function state()
    {
        return $this->belongsTo('App\States','state_id');
    }
	public function city()
    {
        return $this->belongsTo('App\Cities','city_id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Categories','category_id');
    }

    public function inctype()
    {
        return $this->belongsTo('App\IncorporationType','business_incorporation_type');
    }

    public function jobs()
    {
        return $this->belongsTo('App\Jobs','user_id');
    }

     public function user()
    {
        return $this->belongsTo('App\SiteUsers','user_id');
    }
}
