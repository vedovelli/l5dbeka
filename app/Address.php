<?php

namespace App;

class Address extends BaseModel
{
    protected $connection = 'pgsql';

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
