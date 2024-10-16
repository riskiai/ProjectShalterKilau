<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelAnakBinaan extends Model
{
    use HasFactory;

    protected $table = 'level_as_anak_binaan'; 

    protected $primaryKey = 'id_level_anak_binaan';

    protected $fillable = [
        'nama_level_binaan'
    ];
}
