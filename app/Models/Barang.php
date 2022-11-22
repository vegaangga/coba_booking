<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table ='barang';
    protected $fillable = ['jenis_barang,nama_barang,berat_barang'];
    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

}
