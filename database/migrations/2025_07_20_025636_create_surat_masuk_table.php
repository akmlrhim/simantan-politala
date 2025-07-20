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
		Schema::create('surat_masuk', function (Blueprint $table) {
			$table->id();
			$table->string('perihal', 100);
			$table->string('asal_surat', 100);
			$table->string('nomor_surat', 50);
			$table->date('tanggal_diterima');
			$table->date('tanggal_surat');
			$table->string('file_surat', 255)->nullable();
			$table->string('status', 20)->default('pending');
			$table->foreignId('created_by')->constrained('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('surat_masuk');
	}
};
