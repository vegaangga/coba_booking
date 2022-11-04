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
        Schema::table('jadwal_kapal', function (Blueprint $table) {

            // 1. Create new column
            // You probably want to make the new column nullable
            $table->char('asal_pelabuhan_id',10)
                ->after('id_rute');

            $table->char('tujuan_pelabuhan_id',10)
                ->after('asal_pelabuhan_id');

            // 2. Create foreign key constraints
            $table->foreign('asal_pelabuhan_id')
                ->references('kode_pelabuhan')
                ->on('pelabuhan')
                ->onDelete('cascade');

            // 2. Create foreign key constraints
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
        Schema::table('booking', function (Blueprint $table) {

            // 1. Drop foreign key constraints
            $table->dropForeign(['asal_pelabuhan_id']);

            // 2. Drop the column
            $table->dropColumn('asal_pelabuhan_id');

            $table->dropForeign(['tujuan_pelabuhan_id']);

            // 2. Drop the column
            $table->dropColumn('tujuan_pelabuhan_id');
        });
    }
};
