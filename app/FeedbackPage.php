<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackPage extends Model
{
    protected $table = 'feedback_page';
    protected $guarded = ['id'];
    public $timestamps = false;
}
