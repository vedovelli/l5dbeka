<?php

namespace App;

class Customer extends BaseModel
{
    protected $connection = 'pgsql';

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function telephones()
    {
        return $this->hasMany(Telephone::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
