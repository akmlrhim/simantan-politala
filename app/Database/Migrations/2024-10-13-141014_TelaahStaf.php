<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TelaahStaf extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_telaah' => [
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
            'uuid' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'id_staf' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tanggal_telaah' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'catatan_telaah' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_telaah', true);
        $this->forge->addForeignKey('id_surat_masuk', 'surat_masuk', 'id_surat_masuk', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_staf', 'staf', 'id_staf', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('telaah_staf');
    }

    public function down()
    {
        $this->forge->dropTable('telaah_staf');
    }
}
