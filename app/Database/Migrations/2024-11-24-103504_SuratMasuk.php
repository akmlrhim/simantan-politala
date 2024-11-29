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
            'asal_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_diterima' => [
                'type' => 'DATE',
            ],
            'tanggal_surat' => [
                'type' => 'DATE',
            ],
            'file_surat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'perihal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status_telaah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'belum_ditelaah',
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
        $this->forge->createTable('surat_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('surat_masuk');
    }
}
