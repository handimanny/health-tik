<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategoris'; //for relasi
    
    public function artikel() //for relasi
    {
        return $this->hasMany(Artikel::class); //for relasi
    }
}
