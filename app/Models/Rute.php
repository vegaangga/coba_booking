<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rute';

    public function pelabuhan()
    {
        return $this->belongsTo(Pelabuhan::class);
    }

    // Rute -> Jadwal (One to Many)
    public function jadwal_kapal()
    {
        return $this->hasMany(JadwalKapal::class);
    }
}
