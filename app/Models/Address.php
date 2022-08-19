<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'zipcode_id',
        'country',
        'city',
        'street',
        'number',
        'apartment',
        'created_at',
        'updated_at',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function zipCodes()
    {
        return $this->hasMany(Zipcode::class);
    }
}
