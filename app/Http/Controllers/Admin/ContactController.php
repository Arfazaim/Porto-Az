<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact; // Import Model
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all(); // Ambil semua kontak
        return view('admin.contacts.index', compact('contacts'));
    }

    // Method lainnya (create, store, show, edit, update, destroy) akan kita isi nanti
    // ...
}