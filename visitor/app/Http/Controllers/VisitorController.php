<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Visitor;

class VisitorController extends Controller
{
    public function index(): View
    {
         // Number of items per page

        $visitors = Visitor::orderBy('created_at', 'desc')->paginate(10);
        return view('visitor.home', ['visitors' => $visitors]);
    
    }

    public function create(): View
    {
        return view('visitor.createTamu');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'tanggal_kunjungan' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'instansi' => 'required|string',
            'data_dicari' => 'required|string',
            'keperluan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            // Add other validation rules for additional fields if needed
        ]);

        // Create a new Visitor instance and fill it with the validated data
        $visitor = new Visitor($validatedData);

        // Save the visitor to the database
        $visitor->save();

        // Redirect back to the dashboard with a success message
        return Redirect::route('home')->with('success', 'Buku Tamu berhasil ditambahkan');
        
    }
}
