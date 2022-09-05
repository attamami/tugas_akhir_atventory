<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satuans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_satuan',50);
            $table->timestamps();
        });

        DB::table('satuans')->insert([
            ['nama_satuan' => 'Dus'],
            ['nama_satuan' => 'Pack'],
            ['nama_satuan' => 'Lusin'],
            ['nama_satuan' => 'Renceng'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satuans');
    }
};
