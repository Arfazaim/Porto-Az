<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'level',
        'icon',
    ];
}