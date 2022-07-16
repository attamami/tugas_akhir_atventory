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
            $table->id();
            $table->string('nama_satuan',50);
            $table->timestamps();
        });

        DB::table('satuans')->insert([
            ['id' => '1', 'nama_satuan' => 'Dus'],
            ['id' => '2', 'nama_satuan' => 'Pack'],
            ['id' => '3', 'nama_satuan' => 'Lusin'],
            ['id' => '4', 'nama_satuan' => 'Renceng'],
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
