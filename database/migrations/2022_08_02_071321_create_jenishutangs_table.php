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
        Schema::create('jenishutangs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_hutang',50);
            $table->timestamps();
        });
        DB::table('jenishutangs')->insert([
            ['id' => '1', 'jenis_hutang' => 'Cicilan'],
            ['id' => '2', 'jenis_hutang' => 'Jatuh Tempo'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenishutangs');
    }
};
