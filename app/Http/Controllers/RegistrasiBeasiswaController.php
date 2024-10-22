<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Mahasiswa; // Import the Mahasiswa model
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegistrasiBeasiswaController extends Controller
{
    public function index()
    {
        // Get the authenticated Mahasiswa
        $mahasiswa = Auth::user(); // This will get the authenticated Mahasiswa

        // Fetch all scholarships from the database
        $beasiswaList = Beasiswa::all();

        // Pass the Mahasiswa and Beasiswa list to the view
        return view('registrasi', compact('mahasiswa', 'beasiswaList'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'nomor_hp' => 'required|numeric',
            'semester' => 'required|integer',
            'pilihan_beasiswa' => 'required|exists:beasiswa,id',
            'berkas_syarat' => 'required|file|mimes:pdf,jpg,png,docx,doc|max:2048',
        ]);
    
        if ($request->hasFile('berkas_syarat')) {
            $filePath = $request->file('berkas_syarat')->store('uploads', 'public'); 
            
            $originalBerkas = $request->file('berkas_syarat')->getClientOriginalName();
    
            $validatedData['berkas_syarat'] = $filePath;
            $validatedData['original_berkas'] = $originalBerkas;
        }
    
        $mahasiswa = Auth::user();
    
        $mahasiswa->email = $validatedData['email'];
        $mahasiswa->nomor_hp = $validatedData['nomor_hp'];
        $mahasiswa->semester = $validatedData['semester'];
        $mahasiswa->beasiswa = $validatedData['pilihan_beasiswa'];
        $mahasiswa->berkas_syarat = $validatedData['berkas_syarat'];
        $mahasiswa->original_berkas = $validatedData['original_berkas'];
        $mahasiswa->status_ajuan = 'Telah Diajukan';
    
        // Attempt to save the Mahasiswa model
        if ($mahasiswa->save()) {
            // Redirect to a desired route with a success message
            return redirect()->route('registrasi')->with('success', 'Registration successful!');
        } else {
            // Handle save failure
            return back()->withErrors(['save' => 'Failed to save the data. Please try again.']);
        }
    }
    
    
}
