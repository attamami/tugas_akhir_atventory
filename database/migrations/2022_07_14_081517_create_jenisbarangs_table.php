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
        Schema::create('jenisbarangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis',50);
            $table->timestamps();
        });

        DB::table('jenisbarangs')->insert([
            ['id' => '1', 'nama_jenis' => 'Makanan'],
            ['id' => '2', 'nama_jenis' => 'Minuman'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenisbarangs');
    }
};
