<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use PhpParser\Node\Expr\Cast\Array_;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            $data = [
                'email'         => $faker->email,
                'username'      => $faker->userName,
                'password'      => password_hash('password', PASSWORD_BCRYPT),
                'nama_lengkap'  => $faker->name,
                'jabatan_id'    => $faker->numberBetween(1, 2),
                'role'          => $faker->randomElement(['Admin', 'Ketua Jurusan', 'Direktur']),
                'foto'          => 'default.jpeg',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];

            $this->db->table('users')->insert($data);
        }
    }
}
