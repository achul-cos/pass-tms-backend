<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    /** @use HasFactory<\Database\Factories\TiketFactory> */
    use HasFactory;

    public function penumpangs() 
    {
        return $this->belongsTo(Penumpang::class);
    }

    public function jadwals()
    {
        return $this->belongsTo(Jadwal::class);
    }    
}
