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
        Schema::create('lunashutangs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_lunas',50);
            $table->timestamps();
        });
        DB::table('lunashutangs')->insert([
            ['id' => '1', 'jenis_lunas' => 'Lunas'],
            ['id' => '2', 'jenis_lunas' => 'Belum Lunas'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lunashutangs');
    }
};
