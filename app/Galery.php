<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table = 'galeri';
    protected $guarded = ['id'];
    public $timestamps = false;
}
