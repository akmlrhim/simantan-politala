<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 40; $i++) {
            Jabatan::create([
                'nama' => $faker->jobTitle()
            ]);
        }
    }
}
