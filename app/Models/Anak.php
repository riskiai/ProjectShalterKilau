<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak'; // Nama tabel

    protected $primaryKey = 'id_anak'; // Primary key

    protected $attributes = [
        'status_validasi' => self::STATUS_TIDAK_AKTIF,
    ];
    

    protected $fillable = [
        'id_keluarga',
        'id_anak_pend',
        'id_kelompok',
        'id_shelter',
        'id_donatur',
        'id_level_anak_binaan',
        'nik_anak',
        'anak_ke',
        'dari_bersaudara',
        'nick_name',
        'full_name',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'tinggal_bersama',
        'status_validasi',
        'status_cpb',
        'jenis_anak_binaan',
        'hafalan',
        'pelajaran_favorit',
        'hobi',
        'prestasi',
        'jarak_rumah',
        'transportasi',
        'foto',
        'status',
    ];

    const STATUS_AKTIF = 'Aktif';
    const STATUS_TIDAK_AKTIF = 'Tidak Aktif';
    const STATUS_DITOLAK = 'Ditolak';
    const STATUS_DITANGGUHKAN = 'Ditangguhkan';
    const STATUS_NON_AKTIF = 'Non Aktif'; // Status non aktif sudah digunakan di tempat lain
    
   // Constants for status_cpb
   const STATUS_CPB_BCPB = 'BCPB';
   const STATUS_CPB_NPB = 'NPB';
   const STATUS_CPB_CPB = 'CPB';
   const STATUS_CPB_PB = 'PB';

   // Override boot method to automatically set status_cpb based on jenis_anak_binaan
   protected static function boot()
   {
       parent::boot();

       // Listen to the retrieved event to update status_cpb
       static::retrieved(function ($anak) {
           $anak->updateStatusCpb();
       });

       // Ensure the status_cpb is updated before saving the model
       static::saving(function ($anak) {
           $anak->updateStatusCpb();
       });
   }

   // Add logic to handle status_cpb
   public function updateStatusCpb()
   {
       if ($this->jenis_anak_binaan == 'BPCB') {
           $this->attributes['status_cpb'] = self::STATUS_CPB_BCPB;
       } elseif ($this->jenis_anak_binaan == 'NPB') {
           $this->attributes['status_cpb'] = self::STATUS_CPB_NPB;
       }
   }

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }

    /**
     * Relasi ke tabel AnakPendidikan.
     */
    public function anakPendidikan()
    {
        return $this->hasOne(AnakPendidikan::class, 'id_anak_pend', 'id_anak_pend');
    }

    

    /**
     * Relasi ke tabel Kelompok.
     */
    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'id_kelompok');
    }

    /**
     * Relasi ke tabel Shelter.
     */
    public function shelter()
    {
        return $this->belongsTo(Shelter::class, 'id_shelter');
    }

    /**
     * Relasi ke tabel Donatur.
     */
    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'id_donatur');
    }

    /**
     * Relasi ke tabel LevelAnakBinaan.
     */
    public function levelAnakBinaan()
    {
        return $this->belongsTo(LevelAnakBinaan::class, 'id_level_anak_binaan');
    }
}
