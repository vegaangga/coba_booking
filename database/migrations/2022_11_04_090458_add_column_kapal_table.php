<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKapalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kapal', function (Blueprint $table) {

            // 1. Create new column
            // You probably want to make the new column nullable
            $table->dropColumn('kapasitas');

            $table->integer('id_trip')->unsigned()
            ->after('nama_kapal');

            // 2. Create foreign key constraints
            $table->foreign('id_trip')
                ->references('id')
                ->on('trip')
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
        //
    }
}
