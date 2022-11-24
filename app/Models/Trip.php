<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rute;
use App\Models\Kapal;

class Trip extends Model
{
    use HasFactory;
    protected $table = 'trip';
    protected $fillable = [
        'nama_trip',
        'asal_pelabuhan_id',
        'final_pelabuhan_id',
        'rute',
        'id_kapal'];

    public function pelabuhan()
    {
        return $this->belongsTo(Pelabuhan::class);
    }
    public function rute()
    {
        return $this->MasMany(Rute::class);
    }
    public function kapal()
    {
        return $this->belongsTo(Kapal::class, 'id_kapal');
    }
}
