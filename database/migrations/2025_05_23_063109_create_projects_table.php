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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul proyek
            $table->string('slug')->unique(); // Slug untuk URL yang rapi
            $table->text('description'); // Deskripsi proyek
            $table->string('image_path')->nullable(); // Path gambar cover proyek
            $table->string('github_link')->nullable(); // Link ke repositori GitHub
            $table->string('demo_link')->nullable(); // Link demo proyek (jika ada)
            $table->text('technologies_used')->nullable(); // Teknologi yang digunakan (bisa berupa string JSON atau teks biasa)
            $table->date('completion_date')->nullable(); // Tanggal selesai proyek
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};