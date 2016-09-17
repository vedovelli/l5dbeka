<?php

namespace App;

class Tag extends BaseModel
{
    protected $connection = 'pgsql';

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
