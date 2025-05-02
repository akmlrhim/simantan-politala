<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratKeluar extends Migration
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
			'perihal' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'tanggal_surat' => [
				'type' => 'DATE',
				'null' => true,
			],
			'isi' => [
				'type' => 'TEXT',
			],
			'created_by' => [
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

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('surat_keluar');
	}

	public function down()
	{
		$this->forge->dropTable('surat_keluar');
	}
}
