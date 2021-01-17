<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quiz';
    protected $guarded = [];

    public function quiz_jawab()
    {
        return $this->hasMany(QuizJawab::class, 'quiz_id', 'id');
    }
}
