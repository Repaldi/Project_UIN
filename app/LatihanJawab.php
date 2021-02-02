<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatihanJawab extends Model
{
    protected $table = 'latihan_jawab';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function latihan_siswa()
    {
        return $this->belongsTo(LatihanSiswa::class);
    }

    public function pilgan()
    {
        return $this->belongsTo(Pilgan::class);
    }

}
