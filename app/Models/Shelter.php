<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelter extends Model
{
    use HasFactory;

    protected $table = 'shelter'; // Nama tabel
    protected $primaryKey = 'id_shelter'; 

    protected $fillable = ['nama_shelter', 'nama_kordinator', 'no_telpon', 'alamat', 'id_wilbin']; // Kolom yang bisa diisi

    /**
     * Relasi ke tabel wilbin.
     */
    public function wilbin()
    {
        return $this->belongsTo(Wilbin::class, 'id_wilbin');
    }

    public function tutors()
    {
        return $this->hasMany(Tutor::class, 'id_shelter');
    }

    public function kelompok()
    {
        return $this->hasMany(Kelompok::class, 'id_shelter');
    }

    public function anak()
    {
        return $this->hasMany(Anak::class, 'id_shelter');
    }
}
