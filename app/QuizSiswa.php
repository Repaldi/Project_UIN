<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizSiswa extends Model
{
    protected $table = 'quiz_siswa';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz_jawab()
    {
        return $this->hasMany(QuizJawab::class, 'quiz_siswa_id', 'id')->withTrashed();
    }
}
