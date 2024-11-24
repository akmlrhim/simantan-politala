<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disposisi extends Migration
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
            'surat_masuk_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'dari_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'kepada_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'instruksi' => [
                'type' => 'TEXT',
            ],
            'tanggal_disposisi' => [
                'type' => 'DATE',
            ],
            'batas_waktu' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'in_progress', 'done'],
                'default' => 'pending',
            ],
            'catatan' => [
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
        $this->forge->addForeignKey('surat_masuk_id', 'surat_masuk', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('dari_user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kepada_user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('disposisi');
    }

    public function down()
    {
        $this->forge->dropTable('disposisi');
    }
}
