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
      $table->foreignId('surat_masuk_id')->constrained('surat_masuk')->onDelete('cascade');

      $table->string('nomor_agenda', 140);
      $table->string('tingkat_surat', 60);
      $table->json('instruksi_disposisi');
      $table->text('catatan')->nullable();

      $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

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
