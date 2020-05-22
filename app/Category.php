<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title','description'
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
