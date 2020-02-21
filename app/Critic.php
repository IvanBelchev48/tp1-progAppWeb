<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Critic extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function films(){
        return $this->belongsTo('App\Film');
    }
}
