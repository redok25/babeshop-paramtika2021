<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'servis';
    protected $guarded = ['id'];
    public $timestamps = false;
}
