<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Trip;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rute';
    protected $fillable = [
        'id_trip',
        'asal_pelabuhan_id',
        'tujuan_pelabuhan_id',
        'urutan',
        'status',
        'ETA',
        'ETD'];

    public function pelabuhan()
    {
        return $this->belongsTo(Pelabuhan::class);
    }

    // Rute -> Jadwal (One to Many)
    public function jadwal_kapal()
    {
        return $this->hasMany(JadwalKapal::class);
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'id_trip');
    }
}
