<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'address_id',
        'bathrooms_count',
        'bedrooms_count',
        'square_ft',
        'house_type_id',
        'rental_rate',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function houseTypes()
    {
        return $this->hasMany(HouseType::class);
    }

    public function propertiesMedia()
    {
        return $this->hasMany(PropertyMedia::class);
    }
}
