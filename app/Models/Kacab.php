<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kacab extends Model
{
    use HasFactory;

    protected $table = 'kacab'; // Nama tabel

    protected $fillable = [
        'nama_kacab', 'no_telpon', 'alamat', 'id_prov', 'id_kab', 'id_kec', 'id_kel'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_prov');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kab');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kec');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kel');
    }
}
