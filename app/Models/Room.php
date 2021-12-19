<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guard = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['hotel_id', 'code', 'price', 'status'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
