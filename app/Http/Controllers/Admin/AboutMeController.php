<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMe; // Import Model
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Karena AboutMe biasanya hanya ada satu entri, kita ambil yang pertama
        // atau bisa juga ambil semua jika ada kemungkinan beberapa entri untuk tujuan tertentu.
        // Untuk admin panel, lebih umum langsung mengedit atau membuat jika belum ada.
        $aboutMe = AboutMe::first();
        return view('admin.about-me.index', compact('aboutMe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutMe $aboutMe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutMe $aboutMe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutMe $aboutMe)
    {
        //
    }
}