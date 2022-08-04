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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_penjualan',20);
            $table->string('id_outlet',100);
            $table->string('id_barang',20);
            // $table->string('nama_barang',50);
            // $table->string('jenis_barang',20);
            // $table->string('harga',20);
            // $table->string('satuan',15);
            $table->integer('jumlah');
            $table->integer('totalhrg');
            $table->date('tgl_jual');
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
        Schema::dropIfExists('penjualans');
    }
};
