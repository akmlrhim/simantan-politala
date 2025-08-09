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

            $table->foreignId('disposisi_id')->constrained('disposisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('kepada_user_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
