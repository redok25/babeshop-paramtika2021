<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingPage extends Model
{
    protected $table = 'pricing_page';
    protected $guarded = ['id'];
    public $timestamps = false;
}
