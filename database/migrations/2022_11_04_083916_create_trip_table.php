<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nama_trip');
            $table->char('asal_pelabuhan_id',10);
            $table->char('final_pelabuhan_id',10);
            $table->timestamps();

            $table->foreign('asal_pelabuhan_id')
            ->references('kode_pelabuhan')
            ->on('pelabuhan')
            ->onDelete('cascade');

            $table->foreign('final_pelabuhan_id')
            ->references('kode_pelabuhan')
            ->on('pelabuhan')
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
        Schema::dropIfExists('trip');
    }
}
