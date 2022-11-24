<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;
use App\Models\Booking;

class Kapal extends Model
{
    use HasFactory;
    protected $table = 'kapal';

    public function jadwalkapal()
    {
        return $this->belongsTo(JadwalKapal::class);
    }

    // Province -> Store (One to Many)
    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
    public function trip()
    {
        return $this->hasMany(Trip::class);
    }
}
