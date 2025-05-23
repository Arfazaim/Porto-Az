<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
    ];

    // PASTIKAN BARIS INI ADA DAN BENAR
    protected $dates = [
        'start_date',
        'end_date',
    ];
}