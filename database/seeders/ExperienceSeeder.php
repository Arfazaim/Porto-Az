<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon; // PASTIKAN BARIS INI ADA

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $experiences = [
            [
                'title' => 'Junior Web Developer',
                'company' => 'PT. Teknologi Maju',
                'location' => 'Jakarta, Indonesia',
                // PASTIKAN MENGGUNAKAN CARBON::CREATE() UNTUK TANGGAL
                'start_date' => Carbon::create(2022, 1, 1),
                'end_date' => Carbon::create(2023, 12, 31),
                'is_current' => false,
                'description' => 'Bertanggung jawab dalam pengembangan fitur-fitur baru dan pemeliharaan aplikasi web berbasis Laravel. Berkolaborasi dengan tim UI/UX untuk mengimplementasikan desain.',
            ],
            [
                'title' => 'Software Engineer Intern',
                'company' => 'StartUp Inovasi',
                'location' => 'Bandung, Indonesia',
                'start_date' => Carbon::create(2024, 1, 1),
                'end_date' => null, // Ini boleh null jika memang 'is_current' true
                'is_current' => true,
                'description' => 'Membantu pengembangan backend API dengan Laravel dan mengoptimalkan performa database. Berkontribusi pada proses code review.',
            ],
            // ... pengalaman lainnya
        ];

        foreach ($experiences as $experience) {
            // Gunakan updateOrCreate atau firstOrCreate untuk menghindari duplikasi
            Experience::updateOrCreate(
                [
                    'title' => $experience['title'],
                    'company' => $experience['company'],
                    'start_date' => $experience['start_date'],
                ],
                $experience
            );
        }
    }
}