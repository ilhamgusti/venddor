<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->date('tanggal_pengerjaan');
            $table->integer('estimasi');
            $table->string('file_url');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->unsignedBigInteger('vendor_id')->index()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors');

            // $table->unsignedBigInteger('kontrak_id')->nullable()->index();
            // $table->foreign('kontrak_id')->references('id')->on('kontrak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek');
    }
}
