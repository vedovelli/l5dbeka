<?php

namespace App;

class Country extends BaseModel
{
    protected $connection = 'pgsql';

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
