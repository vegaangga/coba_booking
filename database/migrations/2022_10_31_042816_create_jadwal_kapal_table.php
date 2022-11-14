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
        Schema::create('jadwal_kapal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kapal')->unsigned();
            $table->integer('id_rute')->unsigned();
            $table->dateTime('ETA')->nullable();
            $table->dateTime('ETD')->nullable();
            $table->timestamps();

            $table->foreign('id_kapal')
            ->references('id')
            ->on('kapal')
            ->onDelete('cascade');

            $table->foreign('id_rute')
            ->references('id')
            ->on('rute')
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
        Schema::dropIfExists('jadwal_kapal');
    }
};
