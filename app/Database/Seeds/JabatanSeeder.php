<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('jabatan')->insert([
            'jabatan' => 'Direktur',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ]);

        $this->db->table('jabatan')->insert([
            'jabatan' => 'Wakil Direktur',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ]);
    }
}
