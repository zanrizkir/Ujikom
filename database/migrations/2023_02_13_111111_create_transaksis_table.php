<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('keranjang_id');
            $table->foreign('keranjang_id')->references('id')->on('keranjangs')->onDelete('cascade');
            $table->unsignedBigInteger('alamat_id');
            $table->foreign('alamat_id')->references('id')->on('alamats')->onDelete('cascade');
            $table->date('tanggal_transaksi');
            $table->integer('total_harga');
            $table->enum('status', ['proses', 'sukses', 'selesai'])->default('proses');
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
        Schema::dropIfExists('transaksis');
    }
}
