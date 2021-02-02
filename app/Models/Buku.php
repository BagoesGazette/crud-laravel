<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = [
        "kategori_id",
        "judul_buku",
        "penerbit",
        "created_at",
        "updated_at"
    ];
}
