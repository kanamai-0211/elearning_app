<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = [
        'follower_id','followed_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function follow_user()
    {
        return $this->belongsTo('App\User','followed_id');
    }

    public function activity()
    {
        return $this->hasOne('App\Activity');
    }

    public function following()
    {
        return $this->belongsToMany('App\User','relationships','follower_id','followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User','relationships','followed_id','follower_id');
    }
}
