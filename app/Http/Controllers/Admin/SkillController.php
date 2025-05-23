<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill; // Import Model
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all(); // Ambil semua skill
        return view('admin.skills.index', compact('skills'));
    }

    // Method lainnya (create, store, show, edit, update, destroy) akan kita isi nanti
    // ...
}