<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Staf extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_staf' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'uuid' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_staf' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'departemen' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_staf', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('staf');
    }

    public function down()
    {
        $this->forge->dropTable('staf');
    }
}
