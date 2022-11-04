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
        Schema::table('booking', function (Blueprint $table) {

            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('id_barang')->unsigned()
                ->after('id_jadwal');

            // 2. Create foreign key constraints
            $table->foreign('id_barang')
                ->references('id')
                ->on('barang')
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
        Schema::table('booking', function (Blueprint $table) {

            // 1. Drop foreign key constraints
            $table->dropForeign(['id_barang']);

            // 2. Drop the column
            $table->dropColumn('id_barang');
        });
    }
};
