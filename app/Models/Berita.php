<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    // Menentukan primary key sesuai dengan skema yang diberikan
    protected $primaryKey = 'id_berita';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'judul',
        'foto',
        'foto2',
        'foto3',
        'konten',
        'tanggal',
    ];
}
