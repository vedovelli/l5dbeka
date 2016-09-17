<?php

namespace App;

class Telephone extends BaseModel
{
    protected $connection = 'pgsql';

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
