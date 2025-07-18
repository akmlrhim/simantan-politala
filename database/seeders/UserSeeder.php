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

		for ($i = 0; $i < 40; $i++) {
			User::create([
				'nama' => $faker->unique()->name(),
				'email' => $faker->unique()->safeEmail(),
				'role' => $faker->randomElement(['Ketua Jurusan', 'Admin', 'Sespim/Direktur']),
				'nip' => $faker->unique()->numerify('NIP-#########'),
				'jabatan' => $faker->jobTitle(),
				'foto' => 'default.jpg',
				'password' => Hash::make('password'),
			]);
		}
	}
}
