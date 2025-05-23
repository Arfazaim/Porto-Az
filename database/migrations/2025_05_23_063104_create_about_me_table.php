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
        Schema::create('about_me', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Nama lengkap
            $table->string('title')->nullable(); // Jabatan/Profesi (contoh: "Web Developer")
            $table->text('description')->nullable(); // Deskripsi diri
            $table->string('profile_picture_path')->nullable(); // Path gambar profil
            $table->string('resume_path')->nullable(); // Path file resume/CV
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_me');
    }
};