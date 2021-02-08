<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumJawab extends Model
{
    protected $table = 'forum_jawab';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }
}
