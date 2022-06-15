<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

      // Field yang boleh diisi using create
    // protected $fillable = ['published_at','kode','nama','email','status','judul','isi'];
    // Field yang tidak boleh diisi 
    protected $guarded = ['id']; 
    protected $with = ['tujuan']; 


    // public function getRouteKeyName()
    // {
    //     return 'kode';
    // }

    // Eloquent Relationship 
    // 1 Pengaduan Punya 1 Tujuan
    public function tujuan(){
        return $this->belongsTo(Tujuan::class);
    }
    
}
