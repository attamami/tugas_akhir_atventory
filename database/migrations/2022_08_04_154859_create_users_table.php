<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('posisi'); 
            $table->string('username');
            
            $table->string('level');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // DB::table('users')->insert([
        //     ['nama_lengkap' => 'Admin Sumber Rejeki', 'posisi' => 'admin', 'username' => 'adminsr', 'level' => '1', 'password' => '1234'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
