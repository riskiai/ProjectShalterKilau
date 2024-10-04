<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminShelter extends Model
{
    use HasFactory;

    protected $table = 'admin_shelter'; // Nama tabel

    protected $fillable = [
        'user_id', 
        'id_kacab', 
        'id_wilbin', 
        'id_shelter', 
        'nama_lengkap', 
        'alamat_adm', 
        'no_hp', 
        'foto'
    ];

    /**
     * Relasi ke tabel users.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
}
