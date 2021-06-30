<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyNumber extends Model
{
    protected $table = 'verify_number';
    public $timestamps = false;
    protected $guarded =['id'];
}
