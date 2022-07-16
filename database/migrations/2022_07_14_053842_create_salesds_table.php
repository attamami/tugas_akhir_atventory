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
        Schema::create('salesds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_sales',10);
            $table->string('nama_sales',50);
            $table->string('telp',20);
            $table->string('area',100);
            $table->timestamps();
        });

        // DB::table('salesds')->insert([
        //     ['id_sales' => 'SS001', 'nama_sales' => 'Bambang Sulistyo', 'telp' => '+62814-0752-712' ,'area' => 'Bae, Kudus'],
        //     ['id_sales' => 'SS002', 'nama_sales' => 'Ahmad Zamroni', 'telp' => '+62831-5555-66374' , 'area' => 'Dawe, Kudus'],
        //     ['id_sales' => 'SS003', 'nama_sales' => 'Agus Budi Setiawan','telp' => '+62868-1633-85513' , 'area' => 'Gebog, Kudus'],
        //     ['id_sales' => 'SS004', 'nama_sales' => 'Marzuki', 'telp' => '+62870-2181-2564' ,'area' => 'Jati, Kudus'],
        //     ['id_sales' => 'SS005', 'nama_sales' => 'Khoirudin', 'telp' => '+62813-1279-9896' , 'area' => 'Jekulo, Kudus'],
        //     ['id_sales' => 'SS006', 'nama_sales' => 'Alif Rohman', 'telp' => '+62876-5390-94646' , 'area' => 'Kaliwungu, Kudus'],
        //     ['id_sales' => 'SS007', 'nama_sales' => 'Nur Rohman', 'telp' => '+62855-6519-13662' , 'area' => 'Kudus Kota, Kudus'],
        //     ['id_sales' => 'SS008', 'nama_sales' => 'Sutrisno', 'telp' => '+62865-232-713' , 'area' => 'Welahan, Jepara'],
        //     ['id_sales' => 'SS009', 'nama_sales' => 'Khasan Suryo Kusumo', 'telp' => '+62831-0107-880' , 'area' => 'Karanganyar, Demak'],
        //     ['id_sales' => 'SS0010', 'nama_sales' => 'Ulil Albab', 'telp' => '+62884-012-293' , 'area' => 'Undaan, Kudus'],
        // ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salesds');
    }
};
