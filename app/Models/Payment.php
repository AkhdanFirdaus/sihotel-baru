<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'code',
        'code_verification',
        'pin',
        'total',
        'payment_method',
        'credit_number',
        'status',
    ];

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
