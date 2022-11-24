<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'artikels'; //for relasi
  
    public function kategori() //for relasi
    {
        return $this->belongsTo(Kategori::class); //for relasi
    }
    public function user() //for relasi
    {
        return $this->belongsTo(User::class); //for relasi
    }
}
