<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'name',
        'slug',
        'hotel_image',
        'address',
        'email',
        'credit_card',
        'credit_number',
        'tagline',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
