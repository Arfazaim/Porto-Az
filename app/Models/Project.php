<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'github_link',
        'demo_link',
        'technologies_used',
        'completion_date',
    ];

    // Kolom yang harus dikonversi menjadi instance Date
    protected $dates = [
        'completion_date',
    ];
}