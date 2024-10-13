<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disposisi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_disposisi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_surat_masuk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'disposisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_disposisi' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'petugas_disposisi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_disposisi', true);
        $this->forge->addForeignKey('id_surat_masuk', 'surat_masuk', 'id_surat_masuk', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('disposisi');
    }

    public function down()
    {
        $this->forge->dropTable('disposisi');
    }
}
