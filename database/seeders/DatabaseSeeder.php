<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder-seeder yang telah kamu buat
        $this->call([
            AboutMeSeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            ProjectSeeder::class,
            ContactSeeder::class,
            // Jika kamu menggunakan seeder untuk users bawaan Breeze, kamu bisa panggil UserSeeder
            // \Database\Seeders\UserSeeder::class, // Ini adalah seeder default dari Breeze jika ada
        ]);
    }
}