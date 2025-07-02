<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$faker = Faker::create();

		for ($i = 0; $i < 10; $i++) {
			User::create([
				'nama' => $faker->unique()->name(),
				'email' => $faker->unique()->safeEmail(),
				'role' => $faker->randomElement(['Ketua Jurusan', 'Admin', 'Sespim/Direktur']),
				'nip' => $faker->unique()->numerify('NIP-#########'),
				'foto' => $faker->imageUrl(640, 480, 'people', true, 'Faker'),
				'jabatan_id' => $faker->numberBetween(1, 10),
				'password' => Hash::make('password'),
			]);
		}
	}
}
