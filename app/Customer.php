<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\OrgScope;

class Customer extends BaseModel
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrgScope);
    }

    protected $connection = 'pgsql';

    protected $fillable = ['name', 'email', 'birth_date', 'country_id'];

    protected $dates = ['birth_date'];

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

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    // public function getEmailAttribute($value)
    // {
    //     $parts = explode('@', $value);
    //     return '...@'.$parts[1];
    // }

    public function scopeOrg($query)
    {
        return $query->where('email', 'like', '%example.org');
    }
}
