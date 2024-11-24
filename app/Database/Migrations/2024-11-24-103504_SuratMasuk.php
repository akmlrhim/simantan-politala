<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'tanggal_surat' => [
                'type' => 'DATE',
            ],
            'tanggal_terima' => [
                'type' => 'DATE',
            ],
            'pengirim' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'perihal' => [
                'type' => 'TEXT',
            ],
            'isi_ringkas' => [
                'type' => 'TEXT',
            ],
            'file_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'disposisi', 'selesai'],
                'default' => 'pending',
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'klasifikasi_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
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
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('klasifikasi_id', 'klasifikasi_surat', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('surat_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('surat_masuk');
    }
}
