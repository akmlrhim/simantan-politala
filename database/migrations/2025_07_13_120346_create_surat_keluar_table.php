<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('surat_keluar', function (Blueprint $table) {
			$table->id();
			$table->string('nomor_surat', 120);
			$table->string('hal', 120);
			$table->date('tanggal_surat');
			$table->longText('isi_surat');
			$table->json('meta')->nullable();
			$table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('surat_keluar');
	}
};
