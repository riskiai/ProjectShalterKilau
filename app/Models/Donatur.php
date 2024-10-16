<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donatur'; // Nama tabel
    protected $primaryKey = 'id_donatur';
    protected $fillable = [
        'id_users', 
        'id_kacab', 
        'id_wilbin', 
        'id_shelter', 
        'nama_lengkap', 
        'alamat', 
        'no_hp', 
        'id_bank', 
        'no_rekening', 
        'foto', 
        'diperuntukan'
    ]; // Kolom yang bisa diisi

    /**
     * Mengambil URL foto.
     */
    public function getFotoUrlAttribute() {
        return $this->foto ? asset('storage/UsersManagement/Donatur/' . $this->foto) : asset('images/default.png');
    }

    /**
     * Relasi ke tabel users.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    /**
     * Relasi ke tabel kacab.
     */
    public function kacab()
    {
        return $this->belongsTo(Kacab::class, 'id_kacab');
    }

    /**
     * Relasi ke tabel wilbin.
     */
    public function wilbin()
    {
        return $this->belongsTo(Wilbin::class, 'id_wilbin');
    }

    /**
     * Relasi ke tabel shelter.
     */
    public function shelter()
    {
        return $this->belongsTo(Shelter::class, 'id_shelter');
    }

    /**
     * Relasi ke tabel bank.
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }
}
