<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Latihan extends Model
{
    use SoftDeletes;
    protected $table = 'latihan';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function latihan_siswa()
    {
        return $this->hasMany(LatihanSiswa::class,'latihan_id','id');
    }
}
