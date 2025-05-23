<?php

namespace Database\Seeders;

use App\Models\Skill; // Import Model Skill
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP', 'level' => 90, 'icon' => 'fab fa-php'],
            ['name' => 'Laravel', 'level' => 95, 'icon' => 'fab fa-laravel'],
            ['name' => 'JavaScript', 'level' => 85, 'icon' => 'fab fa-js'],
            ['name' => 'Vue.js', 'level' => 80, 'icon' => 'fab fa-vuejs'],
            ['name' => 'MySQL', 'level' => 88, 'icon' => 'fas fa-database'],
            ['name' => 'HTML5', 'level' => 98, 'icon' => 'fab fa-html5'],
            ['name' => 'CSS3', 'level' => 92, 'icon' => 'fab fa-css3-alt'],
            ['name' => 'Tailwind CSS', 'level' => 85, 'icon' => 'fas fa-wind'],
            ['name' => 'Git', 'level' => 75, 'icon' => 'fab fa-git-alt'],
            ['name' => 'Figma', 'level' => 70, 'icon' => 'fab fa-figma'],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }
    }
}