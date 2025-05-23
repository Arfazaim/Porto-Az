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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama skill (contoh: "PHP", "ReactJS", "Laravel")
            $table->integer('level')->nullable(); // Tingkat skill (opsional, contoh: 1-100% atau 1-5 bintang)
            $table->string('icon')->nullable(); // Nama ikon atau path gambar ikon skill
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};