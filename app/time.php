<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class time extends Model
{
    protected $table = 'time';
    protected $guarded = ['id'];
    public $timestamps = false;
}
