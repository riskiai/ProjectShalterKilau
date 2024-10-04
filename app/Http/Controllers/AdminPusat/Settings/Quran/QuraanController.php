<?php

namespace App\Http\Controllers\AdminPusat\Settings\Quran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuraanController extends Controller
{
    /* Quran */
    public function index() {
        return view('AdminPusat.Settings.MasterData.Quran.index');
    }
}
