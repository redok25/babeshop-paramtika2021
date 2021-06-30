<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barbers extends Model
{
    protected $table = 'tukang_cukur';
    protected $guarded =['id'];
    public $timestamps = false;
    public function feedback(){
    	return $this->hasMany('App\Feedback');
    }
}
