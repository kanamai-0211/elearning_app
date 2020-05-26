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

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function getRouteKeyName()//Route {{category}}を使うのに必要
    {
        return 'category';
    }
}
