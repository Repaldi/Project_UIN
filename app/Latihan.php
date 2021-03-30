<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    protected $table = 'latihan';
    protected $guarded = [];

    public function latihan_siswa()
    {
        return $this->hasMany(LatihanSiswa::class,'latihan_id','id');
    }
}
