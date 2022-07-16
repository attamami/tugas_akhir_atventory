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
        Schema::create('outlets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_outlet',10);
            $table->string('nama_outlet',50);
            $table->string('telp',20);
            $table->string('alamat',100);
            $table->timestamps();
        });

        DB::table('outlets')->insert([
            ['id_outlet' => 'OT001', 'nama_outlet' => 'Toko Agus Plastik', 'telp' => '+62862-9903-757', 'alamat' => 'Jepang, Kudus'],
            ['id_outlet' => 'OT002', 'nama_outlet' => 'Toko Haji Ali', 'telp' => '+62899-3544-197','alamat' => 'Babalan, Kudus'],
            ['id_outlet' => 'OT003', 'nama_outlet' => 'Toko Pak Ali', 'telp' => '+62858-8854-1351', 'alamat' => 'Karang Randu, Jepara'],
            ['id_outlet' => 'OT004', 'nama_outlet' => 'Toko Aminah', 'telp' => '+62880-3058-958', 'alamat' => 'Krapyak, Kudus'],
            ['id_outlet' => 'OT005', 'nama_outlet' => 'Toko Anik', 'telp' => '+62891-1998-51794', 'alamat' => 'Jetak, Kudus'],
            ['id_outlet' => 'OT006', 'nama_outlet' => 'Toko Anita', 'telp' => '+62867-9417-059', 'alamat' => 'Kalinyamat, Jepara'],
            ['id_outlet' => 'OT007', 'nama_outlet' => 'Toko Anugrah Blora', 'telp' => '+62885-2107-448', 'alamat' => 'Blora'],
            ['id_outlet' => 'OT008', 'nama_outlet' => 'Toko Arai', 'telp' => '+62855-5460-66497', 'alamat' => 'Prambatan, Kudus'],
            ['id_outlet' => 'OT009', 'nama_outlet' => 'Toko Bu Atik', 'telp' => '+62883-1069-3977', 'alamat' => 'Kalinyamat, Jepara'],
            ['id_outlet' => 'OT010', 'nama_outlet' => 'Toko Anugrah Semarang', 'telp' => '+62855-0572-3925', 'alamat' => 'Semarang'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outlets');
    }
};
