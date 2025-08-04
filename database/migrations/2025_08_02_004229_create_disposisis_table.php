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
    Schema::create('disposisi', function (Blueprint $table) {
      $table->id();
      $table->foreignId('surat_masuk_id')->constrained('surat_masuk')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->string('nomor_agenda', 140);
      $table->string('tingkat_surat', 60);
      $table->json('kepada');
      $table->date('diterima_tanggal');
      $table->string('tujuan_disposisi', 150);
      $table->text('catatan')->nullable();

      $table->foreignId('created_by')->constrained('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('disposisis');
  }
};
