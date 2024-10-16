<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlQuran extends Model
{
    use HasFactory;

    protected $table = 'al_quran';

    // Ubah primary key menjadi id_quran
    protected $primaryKey = 'id_quran';

    protected $fillable = [
        'nama',
        'ayat',
        'keterangan'
    ];
}
