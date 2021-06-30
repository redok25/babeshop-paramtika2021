<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarberPage extends Model
{
    protected $table = 'barber_page';
    protected $guarded = ['id'];
    public $timestamps =false;
}
