<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegistrasiBeasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user();

        if ($mahasiswa->status_ajuan_id == 2) {
            return redirect()->route('hasil');
        }
        
        $beasiswaList = Beasiswa::all();

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
        $mahasiswa->beasiswa_id = $validatedData['pilihan_beasiswa'];
        $mahasiswa->berkas_syarat = $validatedData['berkas_syarat'];
        $mahasiswa->original_berkas = $validatedData['original_berkas'];
        $mahasiswa->status_ajuan_id = 2;
    
        if ($mahasiswa->save()) {
            return redirect()->route('hasil')->with('success', 'Registration successful!');
        } else {
            return back()->withErrors(['save' => 'Failed to save the data. Please try again.']);
        }
    } 
    
}
