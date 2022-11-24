<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rute;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'no_resi',
        'id_user',
        'id_jadwal',
        'id_barang',
        'jenis_container',
        'id_container',
        'nama_penerima',
        'telp_penerima',
        'alamat_penerima',
        'status'];

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
<<<<<<< HEAD
    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_jadwal');
    }

=======
>>>>>>> 82a56dfe6905afef8882aac9a6215548ace8f6f2
    // protected static function boot(){
    //     parent::boot();

    //     static::created(function ($model) {
    //       $model->no_resi = "BKG_" . $model->id;
    //       $model->save();
    //     });
    //   }
}
