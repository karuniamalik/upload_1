<?php

namespace App\Exports;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Users;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;

class UsersExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //
    public function array(): array
    {
        return Barang::select('nama_barang', 'spesifikasi', 'gambar', 'harga', 'kategori_id')->join('kategori', 'barang.kategori_id', '=', 'kategori.id')->get()->toArray();
    }

    // public function map($siswa): array
    // {
    //     return [
    //         $siswa->nama,
    //         $siswa->alamat,
    //         $siswa->nohp,
    //         $siswa->alamat,
    //         $siswa->sekolah_id,

    //     ];

    // }

    public function headings(): array
    {
        return [
            'Nama barang',
            'Spesifikasi',
            'Gambar',
            'Harga',
            'Kategori'


        ];
    }
}
