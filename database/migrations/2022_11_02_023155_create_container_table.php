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
        Schema::create('container', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenis_container')->unsigned();
            $table->char('kode_container');
            $table->float('kapasitas_berat');
            $table->char('kode_kapal',10);
            $table->timestamps();

            $table->foreign('jenis_container')
            ->references('id')
            ->on('jenis_container')
            ->onDelete('cascade');

            $table->foreign('kode_kapal')
            ->references('kode_kapal')
            ->on('kapal')
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
        Schema::dropIfExists('container');
    }
};
