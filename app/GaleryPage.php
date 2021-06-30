<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleryPage extends Model
{
    protected $table = 'galery_page';
    protected $guarded = ['id'];
    public $timestamps =false;
}
