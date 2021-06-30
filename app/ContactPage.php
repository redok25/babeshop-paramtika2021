<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    protected $table = 'contact_page';
    protected $guarded = ['id'];
    public $timestamps = false;
}
