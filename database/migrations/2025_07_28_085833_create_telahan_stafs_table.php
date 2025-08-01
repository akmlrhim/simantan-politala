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
    Schema::create('telahan_staf', function (Blueprint $table) {
      $table->id();
      $table->foreignId('surat_masuk_id')->constrained('surat_masuk')->onDelete('cascade')->onUpdate('cascade');
      $table->foreignId('dari')->constrained('jabatan')->onDelete('cascade')->onUpdate('cascade');
      $table->foreignId('perihal')->constrained('jenis_surat')->onDelete('cascade')->onUpdate('cascade');
      $table->text('isi');
      $table->text('fakta_data');
      $table->text('saran_tindak');
      $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('telahan_staf');
  }
};
