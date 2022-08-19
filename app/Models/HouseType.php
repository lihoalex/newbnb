<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public $timestamps = false;

    public function properties()
    {
        return $this->belongsTo(Property::class);
    }
}
