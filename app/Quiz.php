<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;
    protected $table = 'quiz';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function quiz_jawab()
    {
        return $this->hasMany(QuizJawab::class, 'quiz_id', 'id');
    }
}
