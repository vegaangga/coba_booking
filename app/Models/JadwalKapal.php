<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKapal extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kapal';
    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }

    // Jadwal Kapal -> Kapal (One to Many)
    public function kapal()
    {
        return $this->hasMany(Kapal::class);
    }

    public function booking()
    {
        return $this->hasOne(Store::class);
    }
}
