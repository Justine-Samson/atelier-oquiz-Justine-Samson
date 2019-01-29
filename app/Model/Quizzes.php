<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model 
{
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('App\Model\App_users', 'app_users_id');
    }
}