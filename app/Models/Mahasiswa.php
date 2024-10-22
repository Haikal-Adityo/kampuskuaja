<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'email',
        'nomor_hp',
        'semester',
        'ipk',
        'berkas_syarat',
        'status_ajuan',
        'beasiswa',
    ];    

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa');
    }
}
