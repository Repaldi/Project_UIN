<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email','role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function guru() 
    {
    	return $this->hasOne(Guru::class);
    }
    public function siswa() 
    {
    	return $this->hasOne(Siswa::class,'user_id');
    }

    public function forum() 
    {
    	return $this->hasMany(Forum::class,'user_id','id');
    }

    public function quiz_siswa()
    {
        return $this->hasMany(QuizSiswa::class, 'user_id', 'id');
    }

    public function quiz_jawab()
    {
        return $this->hasMany(QuizJawab::class, 'user_id', 'id');
    }

    public function latihan_siswa()
    {
        return $this->hasMany(LatihanSiswa::class, 'user_id', 'id');
    }

}
