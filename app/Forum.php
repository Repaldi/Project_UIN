<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum_jawab()
    {
        return $this->hasMany(ForumJawab::class, 'forum_id', 'id');
    }

}
