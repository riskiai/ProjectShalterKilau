<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $table = 'tutor'; // Nama tabel
    protected $primaryKey = 'id_tutor'; 
    protected $fillable = ['nama', 'pendidikan', 'alamat', 'email', 'no_hp', 'id_kacab', 'id_wilbin', 'id_shelter', 'maple', 'foto']; // Kolom yang bisa diisi

    // Mengambil URL foto
    public function getFotoUrlAttribute() {
        return $this->foto ? asset('storage/Tutor/DataTutor/' . $this->foto) : asset('images/default.png'); 
    }

    // Relasi ke tabel kacab.
    public function kacab() {
        return $this->belongsTo(Kacab::class, 'id_kacab');
    }

    // Relasi ke tabel wilbin.
    public function wilbin() {
        return $this->belongsTo(Wilbin::class, 'id_wilbin');
    }

    // Relasi ke tabel shelter.
    public function shelter() {
        return $this->belongsTo(Shelter::class, 'id_shelter');
    }
}
