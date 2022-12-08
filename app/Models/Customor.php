<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customor extends Model
{
    use HasFactory;
    protected $table = 'customor';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'keterangan'
    ];
}
