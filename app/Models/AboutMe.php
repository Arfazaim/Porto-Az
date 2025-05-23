<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    // Karena nama tabelnya "about_me" (bukan "about_mes"), kita perlu definisikan
    protected $table = 'about_me';

    // Kolom-kolom yang boleh diisi secara massal (mass assignable)
    protected $fillable = [
        'name',
        'title',
        'description',
        'profile_picture_path',
        'resume_path',
    ];
}