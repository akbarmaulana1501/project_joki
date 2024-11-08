<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_project',
        'desc',
        'tujuan',
        'deadline',
        'fitur',
        'target',
        'jenis_web', 
        'platform'
    ];
}
