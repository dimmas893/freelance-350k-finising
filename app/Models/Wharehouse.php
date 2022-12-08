<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wharehouse extends Model
{
    use HasFactory;

    protected $table = 'wharehouse';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'keterangan'
    ];
}
