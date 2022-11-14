<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRuteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rute', function (Blueprint $table) {

            // 1. Create new column
            // You probably want to make the new column nullable
            //$table->integer('kode_rute')->unsigned()->change();
            //$table->renameColumn('kode_rute', 'id_trip');
            //$table->integer('id_trip')->unsigned()->change();

            // $table->dateTime('ETA')
            // ->nullable()
            //     ->after('urutan');

            // $table->dateTime('ETD')
            // ->nullable()
            //     ->after('ETA');

            $table->integer('id_trip')->unsigned()->change();
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
        Schema::table('rute', function (Blueprint $table) {

            // 1. Drop foreign key constraints
            $table->dropForeign(['id_trip']);

            // 2. Drop the column
            $table->dropColumn('id_trip');
        });
    }
}
