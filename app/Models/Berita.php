<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'deskripsi', 'slug', 'foto', 'id_user', 'id_kategori'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(User::class, 'id_kategori');
    }
    
    public function tag()
    {
        return $this->belongsToMany(User::class, 'tag_berita', 'id_berita', 'id_tag');
    }
}
