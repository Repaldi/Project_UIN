<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizJawab extends Model
{
    protected $table = 'quiz_jawab';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz_siswa()
    {
        return $this->belongsTo(QuizSiswa::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

}
