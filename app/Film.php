<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function critics(){
        return $this->hasMany('App\Critic');
    }

    public function languages(){
        return $this->belongsTo('App\Language');
    }
    public function actors(){
        return $this->belongsToMany('App\Actor');
    }
}
