<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project; // Import Model
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('completion_date', 'desc')->get(); // Ambil semua proyek, urutkan
        return view('admin.projects.index', compact('projects'));
    }

    // Method lainnya (create, store, show, edit, update, destroy) akan kita isi nanti
    // ...
}