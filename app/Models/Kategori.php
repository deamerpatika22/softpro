<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = [
        'kode_kategori',
        'nama_kategori',
        'slug_kategori',
        'deskripsi_kategori',
        'status',
        'foto',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
}
