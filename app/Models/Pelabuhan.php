<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rute;

class Pelabuhan extends Model
{
    use HasFactory;
    protected $table = 'pelabuhan';
    // Inverse
    //Pelabuhan -> rute (one to many)
    public function rutes()
    {
        return $this->hasMany(Rute::class);
    }

    public function trip()
    {
        return $this->hasOne(Trip::class);
    }

}
