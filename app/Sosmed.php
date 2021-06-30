<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $table = 'sosmed';
    protected $guarded = ['id'];
    public $timestamps = false;
}
