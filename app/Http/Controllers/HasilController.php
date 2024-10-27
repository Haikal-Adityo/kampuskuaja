<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::user();

        return view('hasil', compact('mahasiswa'));
    }
}
