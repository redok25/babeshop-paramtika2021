<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $guarded =['id'];
    public $timestamps = false;
    public function barbers(){
    	return $this->belongsTo('App\Barbers','tukang_cukur_id');
    }
}
