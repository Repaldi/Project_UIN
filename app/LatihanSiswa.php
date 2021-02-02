<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatihanSiswa extends Model
{
    protected $table = 'latihan_siswa';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function latihan_jawab()
    {
        return $this->hasMany(LatihanJawab::class, 'latihan_siswa_id', 'id');
    }
}
