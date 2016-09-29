<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'site_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

       public function getAuthIdentifier()
  {
    return $this->getKey();
  }
  public function getAuthPassword()
  {
    return $this->password;
  } 
  public function getRememberToken()
  {
    return $this->remember_token;
  }
  public function setRememberToken($value)
  {
    $this->remember_token = $value;
  }
    public function getRememberTokenName()
  {
    return "remember_token";
  }
  public function getReminderEmail()
  {
    return $this->email;
  }
}
