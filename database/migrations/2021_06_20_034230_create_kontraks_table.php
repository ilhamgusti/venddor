<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kontrak');
            $table->string('file_url');
            $table->text('remarks_cu')->nullable();
            $table->text('remarks_spv')->nullable();
            $table->text('remarks_manager')->nullable();
            $table->text('remarks_direktur')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();


            $table->unsignedBigInteger('proyek_id')->index();
            $table->foreign('proyek_id')->references('id')->on('proyek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontrak');
    }
}
