<?php

namespace Database\Seeders;

use App\Models\AboutMe; // Import Model AboutMe
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan tabel kosong sebelum menambahkan data, atau gunakan firstOrCreate
        // Jika kamu hanya ingin ada satu entri 'About Me'
        AboutMe::firstOrCreate(
            ['id' => 1], // Mencari berdasarkan ID 1
            [
                'name' => 'Nama Lengkap Anda',
                'title' => 'Fullstack Web Developer',
                'description' => 'Halo! Saya adalah seorang pengembang web yang bersemangat dengan fokus pada pembuatan aplikasi web yang tangguh dan interaktif menggunakan Laravel dan JavaScript. Saya suka memecahkan masalah dan terus belajar teknologi baru.',
                'profile_picture_path' => null, // Ganti dengan path gambar jika sudah ada, contoh: 'images/profile.jpg'
                'resume_path' => null, // Ganti dengan path file resume jika sudah ada, contoh: 'documents/resume.pdf'
            ]
        );

        // Jika kamu hanya ingin menambahkan data baru setiap kali seeder dijalankan (tidak disarankan untuk "About Me")
        // AboutMe::create([
        //     'name' => 'Nama Lengkap Anda',
        //     'title' => 'Fullstack Web Developer',
        //     'description' => 'Halo! Saya adalah seorang pengembang web yang bersemangat...',
        //     'profile_picture_path' => null,
        //     'resume_path' => null,
        // ]);
    }
}