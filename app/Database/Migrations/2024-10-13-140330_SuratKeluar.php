<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_surat_keluar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'uuid' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tanggal_kirim' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tujuan_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'perihal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lampiran' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'id_staf' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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

        $this->forge->addKey('id_surat_keluar', true);
        $this->forge->addForeignKey('id_staf', 'staf', 'id_staf', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('surat_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('surat_keluar');
    }
}
