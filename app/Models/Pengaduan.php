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
    
    public function scopeFilter ($query, array $filters ){

      //   Kalau ada request dari pencarian (search)
      // kalau dalam variabel filters ada search ambil searchnya kalau tidak jangan kerjain (false)
      // if(isset($filters['search']) ? $filters['search'] : false)
      // {
          // return $query->where('kode', 'like','%' . $filters['search'] . '%')
          //               ->orWhere('judul', 'like','%' . $filters['search']. '%');
          //  }
      
      // Kalau misalkan ada searchingnya tampilkan kalau tidak jangan eksekusi (false)
      // Null coalescing operator, apa yang mau dicek kalau tidak ada kembalikan nilai (false)
      $query->when($filters['kode'] ?? false, function($query, $kode) {
          return $query->where('kode', $kode ); //Kode yang dicari harus sama persis
      });     
      
  
      }

}
