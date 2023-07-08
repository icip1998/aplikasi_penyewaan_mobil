<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    use HasFactory;

    protected $table = 'returns';
    protected $fillable = [
        'booking_id',
        'return_date',
        'rental_fee',
    ];

    // Relationship dengan peminjaman mobil
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
