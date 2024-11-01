<?php

namespace App\Http\Controllers\AdminPusat\Pemberdayaan\DataKelompok;

use App\Http\Controllers\Controller;
use App\Models\Shelter;
use Illuminate\Http\Request;

class DataKelompokController extends Controller
{
    public function index() {
        // Retrieve shelter data with relationships to kacab and wilbin, along with counting jumlah kelompok
        $data_shelters = Shelter::with(['wilbin.kacab', 'kelompok'])
            ->get();

        return view('AdminPusat.Pemberdayaan.DataKelompok.index', compact('data_shelters'));
    }
}
