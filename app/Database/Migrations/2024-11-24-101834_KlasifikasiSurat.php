<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KlasifikasiSurat extends Migration
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
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'keterangan' => [
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
		$this->forge->createTable('klasifikasi_surat');
	}

	public function down()
	{
		$this->forge->dropTable('klasifikasi_surat');
	}
}
