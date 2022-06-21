<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

       // Eloquent Relationship 
    // Banyak log Punya 1 pengaduan
    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class);
    }

    // Banyak log Punya 1 tujuan
    public function tujuan(){
        return $this->belongsTo(Pengaduan::class);
    }
    

}
