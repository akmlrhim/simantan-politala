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
      $table->foreignId('surat_masuk_id')->constrained('surat_masuk')->onDelete('cascade'); // surat masuk yang ditelaah
      $table->foreignId('dari')->nullable()->constrained('jabatan')->nullOnDelete(); // dari jabatan siapa
      $table->foreignId('perihal')->nullable()->constrained('jenis_surat')->nullOnDelete(); // perihal surat (jenis_surat nya apa)
      $table->text('isi');
      $table->text('fakta_data');
      $table->text('saran_tindak');
      $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
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
