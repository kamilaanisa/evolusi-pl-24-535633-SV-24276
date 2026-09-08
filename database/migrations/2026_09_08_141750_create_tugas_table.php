<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('deadline');
            $table->enum('prioritas', ['rendah', 'sedang', 'tinggi'])->default('sedang');
            $table->boolean('selesai')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};