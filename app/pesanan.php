<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function barbers(){
    	return $this->belongsTo('App\Barbers','tukang_cukur');
    }
}
