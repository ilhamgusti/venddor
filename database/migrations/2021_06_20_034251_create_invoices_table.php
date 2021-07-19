<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('kode_invoice');
            $table->string('file_url');
            $table->string('file_bukti')->nullable();
            $table->integer('total_tagihan');
            $table->tinyInteger('status');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
