<?php

namespace Database\Seeders;

use App\Models\Contact; // Import Model Contact
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            ['platform' => 'Email', 'value' => 'your.email@example.com', 'icon' => 'fas fa-envelope'],
            ['platform' => 'LinkedIn', 'value' => 'linkedin.com/in/yourprofile', 'icon' => 'fab fa-linkedin'],
            ['platform' => 'GitHub', 'value' => 'github.com/yourusername', 'icon' => 'fab fa-github'],
            ['platform' => 'WhatsApp', 'value' => '+6281234567890', 'icon' => 'fab fa-whatsapp'],
        ];

        foreach ($contacts as $contact) {
            Contact::firstOrCreate(['platform' => $contact['platform']], $contact);
        }
    }
}