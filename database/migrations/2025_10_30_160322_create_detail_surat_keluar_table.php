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
        Schema::create('detail_surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_keluar_id')->constrained('surat_keluar')->cascadeOnDelete();
            $table->string('key', 100);
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_surat_keluar');
    }
};
