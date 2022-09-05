<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_barang',10);
            $table->string('nama_barang',50);
            $table->string('jenis_barang',20);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->string('satuan',10);
            $table->integer('stok')->nullable();
            $table->timestamps();
        });
        DB::table('barangs')->insert([
            ['id_barang' => 'BRG01', 'nama_barang' => 'Aqua Gelas', 'jenis_barang' => 'Minuman', 'harga_beli' => 30000,'harga_jual' => 31500,'stok' => 0, 'satuan'=>'Dus'],
            ['id_barang' => 'BRG02', 'nama_barang' => 'Ale-Ale Cup', 'jenis_barang' => 'Minuman', 'harga_beli' => 20000,'harga_jual' => 21000,'stok' => 0, 'satuan'=>'Dus'],
            ['id_barang' => 'BRG03', 'nama_barang' => 'Roma Kelapa', 'jenis_barang' => 'Makanan', 'harga_beli' => 30000,'harga_jual' => 31500,'stok' => 0, 'satuan'=>'Pack'],
            ['id_barang' => 'BRG04', 'nama_barang' => 'Oreo Cookies', 'jenis_barang' => 'Makanan', 'harga_beli' => 24000,'harga_jual' => 25200,'stok' => 0, 'satuan'=>'Pack'],
            ['id_barang' => 'BRG05', 'nama_barang' => 'Sprite Botol Kecil', 'jenis_barang' => 'Minuman', 'harga_beli' => 42000,'harga_jual' => 44100,'stok' => 0, 'satuan'=>'Lusin'],
            ['id_barang' => 'BRG06', 'nama_barang' => 'Coca Cola Sedang', 'jenis_barang' => 'Minuman', 'harga_beli' => 60000,'harga_jual' => 63000,'stok' => 0, 'satuan'=>'Lusin'],
            ['id_barang' => 'BRG07', 'nama_barang' => 'Biskuat', 'jenis_barang' => 'Makanan', 'harga_beli' => 30000,'harga_jual' => 31500,'stok' => 0, 'satuan'=>'Dus'],
            ['id_barang' => 'BRG08', 'nama_barang' => 'Superstar', 'jenis_barang' => 'Makanan', 'harga_beli' => 15000,'harga_jual' => 15750,'stok' => 0, 'satuan'=>'Pack'],
            ['id_barang' => 'BRG09', 'nama_barang' => 'Sarimie Soto Ayam', 'jenis_barang' => 'Makanan', 'harga_beli' => 120000,'harga_jual' => 126000,'stok' => 0, 'satuan'=>'Dus'],
            ['id_barang' => 'BRG10', 'nama_barang' => 'Mie Sedaap Goreng', 'jenis_barang' => 'Makanan', 'harga_beli' => 15000,'harga_jual' => 15750,'stok' => 0, 'satuan'=>'Pack'],

            ['id_barang' => 'BRG11', 'nama_barang' => 'Susu Indomilk', 'jenis_barang' => 'Minuman', 'harga_beli' => 32000,'harga_jual' => 33600,'stok' => 0, 'satuan'=>'Lusin'],
            ['id_barang' => 'BRG12', 'nama_barang' => 'Teh Kotak', 'jenis_barang' => 'Minuman', 'harga_beli' => 28000,'harga_jual' => 29400,'stok' => 0, 'satuan'=>'Lusin'],
            ['id_barang' => 'BRG13', 'nama_barang' => 'Taro Original', 'jenis_barang' => 'Makanan', 'harga_beli' => 46000,'harga_jual' => 48300,'stok' => 0, 'satuan'=>'Dus'],
            ['id_barang' => 'BRG14', 'nama_barang' => 'Tini Wini Biti', 'jenis_barang' => 'Makanan', 'harga_beli' => 40000,'harga_jual' => 42000,'stok' => 0, 'satuan'=>'Dus'],
            ['id_barang' => 'BRG15', 'nama_barang' => 'Susu Frisian Flag', 'jenis_barang' => 'Minuman', 'harga_beli' => 15000,'harga_jual' => 15750,'stok' => 0, 'satuan'=>'Renceng'],
            ['id_barang' => 'BRG16', 'nama_barang' => 'Kopi Kapal Api', 'jenis_barang' => 'Minuman', 'harga_beli' => 20000,'harga_jual' => 21000,'stok' => 0, 'satuan'=>'Renceng'],
            ['id_barang' => 'BRG17', 'nama_barang' => 'Kopi ABC Susu', 'jenis_barang' => 'Minuman', 'harga_beli' => 14000,'harga_jual' => 14700,'stok' => 0, 'satuan'=>'Renceng'],
            ['id_barang' => 'BRG18', 'nama_barang' => 'Nutrisari Mangga', 'jenis_barang' => 'Minuman', 'harga_beli' => 16000,'harga_jual' => 16800,'stok' => 0, 'satuan'=>'Renceng'],
            ['id_barang' => 'BRG19', 'nama_barang' => 'Nutrisari Orange', 'jenis_barang' => 'Minuman', 'harga_beli' => 16000,'harga_jual' => 16800,'stok' => 0, 'satuan'=>'Renceng'],
            ['id_barang' => 'BRG20', 'nama_barang' => 'Roti Basah', 'jenis_barang' => 'Makanan', 'harga_beli' => 60000,'harga_jual' => 63000,'stok' => 0, 'satuan'=>'Dus'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
