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
        Schema::create('hutangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_hutang',10);
            $table->string('id_supplier',50);
            $table->integer('nominal_hutang');
            $table->integer('nominal_terbayar');
            $table->string('jenis_hutang');
            $table->date('tgl_hutang');
            $table->date('jatuh_tempo');
            $table->string('ket_lunas');
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
        Schema::dropIfExists('hutangs');
    }
};
