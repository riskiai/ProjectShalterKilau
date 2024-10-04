<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPusat extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'admin_pusat';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'alamat',
        'no_hp',
        'foto',
    ];

    /**
     * Relasi ke model User.
     * Setiap admin pusat memiliki satu user terkait.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
