<?php

namespace Database\Seeders;

use App\Models\Project; // Import Model Project
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Untuk membuat slug
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Manajemen Karyawan',
                'description' => 'Aplikasi web untuk mengelola data karyawan, absensi, dan penggajian. Dilengkapi dengan fitur otentikasi dan hak akses berbasis peran.',
                'image_path' => null, // Ganti dengan path gambar jika ada, contoh: 'images/project1.jpg'
                'github_link' => 'https://github.com/yourusername/employee-management',
                'demo_link' => null,
                'technologies_used' => json_encode(['Laravel', 'MySQL', 'Blade', 'Bootstrap']), // Contoh format JSON
                'completion_date' => Carbon::create(2023, 10, 15),
            ],
            [
                'title' => 'Website Portfolio Pribadi',
                'description' => 'Website ini adalah platform untuk menampilkan proyek-proyek, skill, dan pengalaman saya sebagai seorang developer. Dibangun dengan framework Laravel dan desain Figma.',
                'image_path' => null, // Ganti dengan path gambar jika ada, contoh: 'images/project2.jpg'
                'github_link' => 'https://github.com/yourusername/personal-portfolio',
                'demo_link' => 'http://yourportfolio.com',
                'technologies_used' => json_encode(['Laravel', 'Breeze', 'MySQL', 'Tailwind CSS', 'Figma']),
                'completion_date' => Carbon::create(2024, 5, 23), // Tanggal hari ini
            ],
            [
                'title' => 'Aplikasi E-commerce Sederhana',
                'description' => 'Platform belanja online dengan fitur keranjang, pembayaran, dan manajemen produk. Dirancang untuk skala kecil hingga menengah.',
                'image_path' => null, // Ganti dengan path gambar jika ada, contoh: 'images/project3.jpg'
                'github_link' => 'https://github.com/yourusername/simple-ecommerce',
                'demo_link' => null,
                'technologies_used' => json_encode(['Laravel', 'Vue.js', 'PostgreSQL', 'Stripe API']),
                'completion_date' => Carbon::create(2023, 7, 1),
            ],
        ];

        foreach ($projects as $project) {
            $project['slug'] = Str::slug($project['title']); // Otomatis membuat slug dari judul
            Project::firstOrCreate(['slug' => $project['slug']], $project);
        }
    }
}