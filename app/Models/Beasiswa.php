<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswa';

    protected $fillable = ['nama'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'beasiswa_id');
    }
}
