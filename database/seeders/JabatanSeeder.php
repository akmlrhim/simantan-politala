<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatanList = [
            'Ketua Jurusan Komputer dan Bisnis',
            'Direktur / Sekretaris Pimpinan',
            'Ketua Jurusan Teknologi Industri Pertanian',
            'Ketua Jurusan Rekayasa dan Industri',
            'Koordinator Program Studi Teknologi Informasi',
            'Koordinator Program Studi Agroindustri',
            'Koordinator Program Studi Teknologi Otomotif',
            'Koordinator Program Studi Teknologi Rekayasa Komputer dan Jaringan',
            'Koordinator Program Studi Teknologi Rekayasa Konstruksi Jalan dan Jembatan',
            'Koordinator Program Studi Akuntansi'
        ];

        foreach ($jabatanList as $nama) {
            Jabatan::create(['nama' => $nama]);
        }
    }
}
