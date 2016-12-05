<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SiteUsers extends Authenticatable
{
    protected $table = "site_users";
	protected $fillable = ['email', 'first_name'];
}
