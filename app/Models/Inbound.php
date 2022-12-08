<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbound extends Model
{
    use HasFactory;
    protected $table = 'inbound';
    protected $guarded = [];

    public function wharehouse()
    {
        return $this->belongsTo(Wharehouse::class, 'nama', 'id');
    }
}
