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

    // INI YANG BENAR DAN MODERN UNTUK TANGGAL
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Hapus atau komentari baris ini jika sebelumnya ada:
    // protected $dates = [
    //     'start_date',
    //     'end_date',
    // ];
}