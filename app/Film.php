<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Film extends Model
{

    public function critics(){
        return $this->hasMany('App\Critic');
    }

    public function languages(){
        return $this->belongsTo('App\Language');
    }

    public function actors(){
        return $this->belongsToMany('App\Actor', 'actor_films');
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'release_year', 'length', 'description', 'rating', 'language_id', 'special_features', 'image'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
