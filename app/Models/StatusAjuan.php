<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAjuan extends Model
{
    use HasFactory;

    protected $table = 'status_ajuan';

    protected $fillable = ['status'];
}
