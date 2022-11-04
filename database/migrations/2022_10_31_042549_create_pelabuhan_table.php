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
        Schema::create('pelabuhan', function (Blueprint $table) {
            $table->char('kode_pelabuhan',10);
            $table->primary('kode_pelabuhan');
            $table->string('nama_pelabuhan');
            $table->string('alamat');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelabuhan');
    }
};
