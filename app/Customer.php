<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends BaseModel
{
    use SoftDeletes;

    protected $connection = 'pgsql';

    protected $fillable = ['name', 'email', 'birth_date', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

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
