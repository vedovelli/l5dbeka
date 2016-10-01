<?php

namespace App;

class Telephone extends BaseModel
{
    protected $connection = 'pgsql';

    protected $fillable = ['number', 'type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
