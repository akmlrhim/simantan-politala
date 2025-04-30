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
			'jabatan_id' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => 11
			],
			'klasifikasi_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'surat_masuk_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => true,
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'isi_surat' => [
				'type' => 'TEXT',
			],
			'fakta_dan_data' => [
				'type' => 'TEXT',
			],
			'saran_dan_tindak' => [
				'type' => 'TEXT',
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
		$this->forge->addForeignKey('jabatan_id', 'jabatan', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('surat_masuk_id', 'surat_masuk', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('klasifikasi_id', 'klasifikasi_surat', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('telaah_staf');
	}

	public function down()
	{
		$this->forge->dropTable('telaah_staf');
	}
}
