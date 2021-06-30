<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPage extends Model
{
    protected $table = "booking_page";
    protected $guarded = ['id'];
    public $timestamps = false;
}
