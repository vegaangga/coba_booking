<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_jadwal', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_rute',10)->unsigned();
            $table->char('asal_pelabuhan_kode',10)->unsigned();
            $table->char('tujuan_pelabuhan_kode,10')->unsigned();
            $table->dateTime('ETA');
            $table->dateTime('ETD');
            $table->timestamps();

            $table->foreign('jenis_barang')
            ->references('id')
            ->on('jenis_barang')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_jadwal');
    }
};
