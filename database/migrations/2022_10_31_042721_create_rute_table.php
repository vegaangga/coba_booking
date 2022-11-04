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
        Schema::create('rute', function (Blueprint $table) {
            $table->increments('id');
            $table->char('kode_rute',5);
            $table->char('asal_pelabuhan_id',10);
            $table->char('tujuan_pelabuhan_id',10);
            $table->integer('urutan');
            $table->timestamps();

            $table->foreign('asal_pelabuhan_id')
            ->references('kode_pelabuhan')
            ->on('pelabuhan')
            ->onDelete('cascade');

            $table->foreign('tujuan_pelabuhan_id')
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
        Schema::dropIfExists('rute');
    }
};
