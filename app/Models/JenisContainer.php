<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisContainer extends Model
{
    use HasFactory;
    protected $table = 'jenis_container';

    public function container()
    {
        return $this->hasMany(Container::class);
    }
}
