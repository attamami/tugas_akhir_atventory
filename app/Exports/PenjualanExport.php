<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class PenjualanExport implements FromCollection, WithHeadings
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
        
        $data = DB::table('penjualans')
                ->Join('barangs', 'penjualans.id_barang', '=', 'barangs.id_barang')
                ->Join('salesds', 'penjualans.id_sales', '=', 'salesds.id_sales')
                ->Join('outlets', 'penjualans.id_outlet', '=', 'outlets.id_outlet')
                ->select(
                    'penjualans.id_penjualan',
                    'salesds.nama_sales',
                    'penjualans.tgl_jual',
                    'outlets.nama_outlet',
                    // 'penjualans.id_barang',
                    'barangs.nama_barang',
                    'barangs.jenis_barang',
                    'barangs.harga_jual',
                    'barangs.satuan',
                    'penjualans.jumlah',
                    'penjualans.totalhrg',
                    
                )
                ->whereBetween('penjualans.tgl_jual',[$this->tgl_awal,$this->tgl_akhir])
                ->get();

        $sum_total = Penjualan::whereBetween('tgl_jual',[$this->tgl_awal, $this->tgl_akhir])
                ->get();
        return collect($data, $sum_total);
    }

    public function headings(): array{
        return [
            'ID Penjualan',
            'Nama Sales',
            'Tanggal Jual',
            'Nama Outlet',
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
