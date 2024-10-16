<?php

namespace App\Http\Controllers\AdminPusat\Settings\AnakTutor\Tutor;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use App\Models\Kacab;
use App\Models\Wilbin;
use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function index(Request $request) {
        $query = Tutor::with('kacab', 'wilbin', 'shelter');
    
        if ($request->has('id_kacab') && $request->id_kacab != '') {
            $query->where('id_kacab', $request->id_kacab);
        }
    
        if ($request->has('id_wilbin') && $request->id_wilbin != '') {
            $query->where('id_wilbin', $request->id_wilbin);
        }
    
        if ($request->has('id_shelter') && $request->id_shelter != '') {
            $query->where('id_shelter', $request->id_shelter);
        }
    
        $data_tutor = $query->get();
        $kacab = Kacab::all();
        
        return view('AdminPusat.Settings.AnakTutor.Tutor.index', compact('data_tutor', 'kacab'));
    }
    

    public function create() {
        $kacab = Kacab::all();
        $wilbin = Wilbin::all(); 
        return view('AdminPusat.Settings.AnakTutor.Tutor.create', compact('kacab', 'wilbin'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:tutor',
            'no_hp' => 'required',
            'id_kacab' => 'required',
            'id_wilbin' => 'required',
            'id_shelter' => 'required',
            'maple' => 'required',
            // 'status' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Menyimpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('Tutor/DataTutor', 'public');
        }

        Tutor::create(array_merge($request->all(), [
            'foto' => $fotoPath
        ]));

        $lastPage = ceil(Tutor::count() / 10) - 1;

        return redirect()->route('tutor')
                         ->with('success', 'Data Tutor berhasil ditambahkan')
                         ->with('currentPage', $lastPage);
    }    

    public function edit($id_tutor, Request $request) {
        $tutor = Tutor::findOrFail($id_tutor);
        $kacab = Kacab::all();
        $wilbin = Wilbin::where('id_kacab', $tutor->id_kacab)->get(); 
        $shelter = Shelter::where('id_wilbin', $tutor->id_wilbin)->get();
        return view('AdminPusat.Settings.AnakTutor.Tutor.edit', compact('tutor', 'kacab', 'wilbin', 'shelter'))
            ->with('currentPage', $request->query('current_page', 0));
    }

    public function update(Request $request, $id_tutor) {
        $request->validate([
            'nama' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:tutor,email,' . $id_tutor . ',id_tutor', // Ubah ini
            'no_hp' => 'required',
            'id_kacab' => 'required',
            'id_wilbin' => 'required',
            'id_shelter' => 'required',
            'maple' => 'required',
            // 'status' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $tutor = Tutor::findOrFail($id_tutor);
    
        // Update foto jika ada
        if ($request->hasFile('foto')) {
            if ($tutor->foto) {
                Storage::disk('public')->delete($tutor->foto);
            }
            $fotoPath = $request->file('foto')->store('Tutor/DataTutor', 'public');
            $tutor->update(array_merge($request->all(), ['foto' => $fotoPath]));
        } else {
            $tutor->update($request->all());
        }
    
        return redirect()->route('tutor')
                         ->with('success', 'Data Tutor berhasil diperbarui')
                         ->with('currentPage', $request->input('current_page', 0));
    }

    public function destroy(Request $request, $id_tutor) {
        $tutor = Tutor::findOrFail($id_tutor);
        if ($tutor->foto) {
            Storage::disk('public')->delete($tutor->foto);
        }
        $tutor->delete();

        return redirect()->route('tutor')
                         ->with('success', 'Data Tutor berhasil dihapus')
                         ->with('currentPage', $request->input('current_page', 0));
    }
    
    public function getWilbinByKacab($id_kacab) {
        $wilbin = Wilbin::where('id_kacab', $id_kacab)->get();
        return response()->json($wilbin);
    }

    public function getShelterByWilbin($id_wilbin) {
        $shelter = Shelter::where('id_wilbin', $id_wilbin)->get();
        return response()->json($shelter);
    }
}
