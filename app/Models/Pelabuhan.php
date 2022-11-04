<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
