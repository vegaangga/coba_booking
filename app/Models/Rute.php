<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelabuhan;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rute';
    protected $fillable = [
        'id',
        'id_trip',
        'asal_pelabuhan_id',
        'tujuan_pelabuhan_id',
        'urutan',
        'status',
    ];

    public function awal()
    {
        return $this->hasOne(Pelabuhan::class, 'kode_pelabuhan', 'asal_pelabuhan_id');
    }

    public function tujuan()
    {
        return $this->hasOne(Pelabuhan::class, 'kode_pelabuhan', 'tujuan_pelabuhan_id');
    }
    // Rute -> Jadwal (One to Many)
    public function jadwal_kapal()
    {
        return $this->hasMany(JadwalKapal::class);
    }
}
