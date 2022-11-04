<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    // return $this->belongsTo(Barang::class, 'barang_id', 'id');

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jadwalkapal()
    {
        return $this->belongsTo(JadwalKapal::class);
    }
    public function container()
    {
        return $this->belongsTo(Container::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
