<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'pgsql';

    public function commentable()
    {
        return $this->morphTo();
    }
}
