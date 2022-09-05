<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class PembelianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $tgl_awal;
    protected $tgl_akhir;
    
    function __construct($tgl_awal,$tgl_akhir) {
            $this->tgl_awal = $tgl_awal;
            $this->tgl_akhir = $tgl_akhir;
    }

    public function collection()
    {
        
        $data = DB::table('pembelians')
                ->Join('barangs', 'pembelians.id_barang', '=', 'barangs.id_barang')
                ->Join('suppliers', 'pembelians.id_supplier', '=', 'suppliers.id_supplier')
                ->select(
                    'pembelians.id_pembelian',
                    'pembelians.tgl_beli',
                    'suppliers.nama_supplier',
                    // 'pembelians.id_barang',
                    'barangs.nama_barang',
                    'barangs.jenis_barang',
                    'barangs.harga_jual',
                    'barangs.satuan',
                    'pembelians.jumlah',
                    'pembelians.totalhrg',
                    
                )
                ->whereBetween('pembelians.tgl_beli',[$this->tgl_awal,$this->tgl_akhir])
                ->get();

        $sum_total = Pembelian::whereBetween('tgl_beli',[$this->tgl_awal, $this->tgl_akhir])
                ->get();
        return collect($data, $sum_total);
    }

    public function headings(): array{
        return [
            'ID Pembelian',
            'Tanggal Beli',
            'Nama Supplier',
            // 'ID Barang',
            'Nama Barang',
            'Jenis Barang',
            'Harga Per Satuan',
            'Satuan',
            'Jumlah',
            'Total Harga',
            
        ];
    }
}
