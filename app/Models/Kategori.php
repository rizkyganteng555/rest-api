<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_tag', 'slug'];
    public function berita()
    {
        return $this->hasMany(Berita::class,'tag_berita','id_tag', 'id_berita');
    }
}
