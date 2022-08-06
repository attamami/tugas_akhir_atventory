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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('id_pembelian',20);
            $table->string('id_supplier',20);
            // $table->string('nama_supplier',100);
            // $table->string('telp',20);
            // $table->string('alamat',100);
            $table->string('id_barang',20);
            // $table->string('nama_barang',50);
            // $table->string('jenis_barang',20);
            // $table->string('harga',20);
            // $table->string('satuan',15);
            $table->integer('jumlah');
            $table->integer('totalhrg');
            $table->date('tgl_beli');
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
        Schema::dropIfExists('pembelians');
    }
};
