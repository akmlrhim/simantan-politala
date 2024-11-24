<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TelaahStaf extends Migration
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
            'nomor_telaah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
            ],
            'surat_masuk_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'tanggal_telaah' => [
                'type' => 'DATE',
            ],
            'perihal' => [
                'type' => 'TEXT',
            ],
            'dasar' => [
                'type' => 'TEXT',
            ],
            'analisis' => [
                'type' => 'TEXT',
            ],
            'kesimpulan' => [
                'type' => 'TEXT',
            ],
            'rekomendasi' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'review', 'approved', 'rejected'],
                'default' => 'draft',
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'file_lampiran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'catatan_review' => [
                'type' => 'TEXT',
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
        $this->forge->addForeignKey('surat_masuk_id', 'surat_masuk', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('telaah_staf');
    }

    public function down()
    {
        $this->forge->dropTable('telaah_staf');
    }
}
