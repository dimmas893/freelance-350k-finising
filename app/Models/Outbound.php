<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbound extends Model
{
    use HasFactory;
    protected $table = 'outbound';
    protected $guarded = [];
    public function wharehouse()
    {
        return $this->belongsTo(Wharehouse::class, 'tujuan', 'id');
    }

    public function p()
    {
        return $this->belongsTo(Customor::class, 'customor', 'id');
    }
}
