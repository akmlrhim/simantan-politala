<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JabatanSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$faker = Faker::create();

		for ($i = 0; $i < 10; $i++) {
			Jabatan::create([
				'nama' => $faker->unique()->jobTitle()
			]);
		}
	}
}
