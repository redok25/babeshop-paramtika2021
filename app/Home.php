<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';
    protected $fillable = ['judul','isi'];
    public $timestamps = false;
}
