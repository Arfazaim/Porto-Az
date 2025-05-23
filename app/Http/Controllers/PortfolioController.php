<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutMe;     // Import Model AboutMe
use App\Models\Skill;       // Import Model Skill
use App\Models\Experience;  // Import Model Experience
use App\Models\Project;     // Import Model Project
use App\Models\Contact;     // Import Model Contact

class PortfolioController extends Controller
{
    /**
     * Menampilkan halaman utama portfolio.
     */
    public function index()
    {
        // Mengambil data "About Me" (karena biasanya hanya ada satu entri)
        $aboutMe = AboutMe::first(); // Mengambil entri pertama

        // Mengambil semua data skills, diurutkan berdasarkan level tertinggi
        $skills = Skill::orderBy('level', 'desc')->get();

        // Mengambil semua data experiences, diurutkan dari yang terbaru (tanggal mulai)
        $experiences = Experience::orderBy('start_date', 'desc')->get();

        // Mengambil semua data projects, diurutkan dari yang terbaru (tanggal selesai)
        $projects = Project::orderBy('completion_date', 'desc')->get();

        // Mengambil semua data contacts
        $contacts = Contact::all();

        // Mengirim data-data ini ke view 'portfolio.index'
        return view('portfolio.index', compact(
            'aboutMe',
            'skills',
            'experiences',
            'projects',
            'contacts'
        ));
    }

    /**
     * Menampilkan halaman detail proyek tertentu.
     */
    public function showProject($slug)
    {
        // Mencari proyek berdasarkan slug. Gunakan firstOrFail() agar Laravel otomatis
        // mengembalikan 404 jika proyek tidak ditemukan.
        $project = Project::where('slug', $slug)->firstOrFail();

        // Mengirim data proyek ke view 'portfolio.show_project'
        return view('portfolio.show_project', compact('project'));
    }

    // Kamu bisa menambahkan method lain di sini, misalnya untuk form kontak, dll.
    // public function contact(Request $request)
    // {
    //     // Logika untuk mengirim email atau menyimpan pesan kontak
    // }
}