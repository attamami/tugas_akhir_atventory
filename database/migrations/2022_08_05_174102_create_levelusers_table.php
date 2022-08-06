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
        Schema::create('levelusers', function (Blueprint $table) {
            $table->id();
            $table->integer('userlevel');
            $table->string('namalevel',20);
            $table->timestamps();
        });
        DB::table('levelusers')->insert([
            ['id' => '1', 'userlevel' => '1','namalevel' => 'Admin'],
            ['id' => '2', 'userlevel' => '2','namalevel' => 'Sales'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levelusers');
    }
};
