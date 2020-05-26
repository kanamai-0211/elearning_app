<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = [
        'choice','question_id','is_correct'
    ];
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
