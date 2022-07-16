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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('id_supplier',10);
            $table->string('nama_supplier',50);
            $table->string('telp',20);
            $table->string('alamat',100);
            $table->timestamps();
        });

        // DB::table('suppliers')->insert([
        //     ['id_supplier' => 'SP001', 'nama_supplier' => 'PT. Pinus Merah Abadi', 'telp' => '0-21-451-6718', 'alamat' => 'Dukuh Bogol, Desa Megawon, RT.01/RW.03, Bogol, Megawon, Kec. Jati, Kabupaten Kudus, Jawa Tengah'],
        //     ['id_supplier' => 'SP002', 'nama_supplier' => 'PT. Jaya Berhasil Bersama', 'telp' => '0-21-730-6852','alamat' => 'Karangampel, Kec. Kaliwungu, Kabupaten Kudus, Jawa Tengah'],
        //     ['id_supplier' => 'SP003', 'nama_supplier' => 'PT. Indomarco Adiprima SP Welahan', 'telp' => '0-31-355-9811', 'alamat' => 'Sobokerto, Gg. Pasar, Kec. Welahan, Kabupaten Jepara, Jawa Tengah'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
