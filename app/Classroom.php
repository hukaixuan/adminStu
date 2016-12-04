<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $table = 'classroom';

    public function students()
    {
    	return $this->hasMany('App\Student','UClass','ClassName');
    	// echo "string";
    }
}
