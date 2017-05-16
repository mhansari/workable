<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SiteUsers extends Authenticatable
{
    protected $table = "site_users";
}
