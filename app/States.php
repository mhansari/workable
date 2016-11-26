<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    public static function all($columns = []) {
    	return parent::all()->sortBy('Name');
  }
}
