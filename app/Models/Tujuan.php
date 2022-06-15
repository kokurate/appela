<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];
    // protected $fillable = ['nama'];

    // 1 tujuan memiliki banyak pengaduan
    public function pengaduan(){
        return $this->hasMany(Pengaduan::class);
    }
    
}
