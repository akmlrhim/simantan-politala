<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$data = [
			['nama' => 'Surat Masuk'],
			['nama' => 'Surat Keluar'],
			['nama' => 'Surat Tugas'],
			['nama' => 'Surat Keputusan'],
			['nama' => 'Surat Undangan'],
			['nama' => 'Nota Dinas'],
		];

		DB::table('jenis_surat')->insert($data);
	}
}
