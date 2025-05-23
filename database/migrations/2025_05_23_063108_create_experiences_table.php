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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Posisi/Jabatan (contoh: "Junior Web Developer")
            $table->string('company'); // Nama perusahaan/organisasi
            $table->string('location')->nullable(); // Lokasi perusahaan/organisasi
            $table->date('start_date'); // Tanggal mulai
            $table->date('end_date')->nullable(); // Tanggal selesai (nullable jika masih bekerja)
            $table->boolean('is_current')->default(false); // True jika ini pengalaman saat ini
            $table->text('description')->nullable(); // Deskripsi pekerjaan/tanggung jawab
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};