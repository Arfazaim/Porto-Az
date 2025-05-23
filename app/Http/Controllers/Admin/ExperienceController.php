<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience; // Import Model
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get(); // Ambil semua pengalaman, urutkan
        return view('admin.experiences.index', compact('experiences'));
    }

    // Method lainnya (create, store, show, edit, update, destroy) akan kita isi nanti
    // ...
}