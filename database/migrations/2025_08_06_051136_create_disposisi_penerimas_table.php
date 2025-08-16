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
        Schema::create('disposisi_penerima', function (Blueprint $table) {
            $table->id();

            $table->foreignId('disposisi_id')->nullable()->constrained('disposisi')->nullOnDelete();

            $table->foreignId('kepada_jabatan_id')->nullable()->constrained('jabatan')->nullOnDelete();

            $table->date('diterima_tanggal')->nullable();
            $table->string('status', 70);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi_penerima');
    }
};
