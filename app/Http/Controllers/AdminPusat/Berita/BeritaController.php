<?php

namespace App\Http\Controllers\AdminPusat\Berita;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $data_berita = Berita::all();
        return view('AdminPusat.Berita.DataBerita.index', compact('data_berita'));
    }

    public function store()
    {
        return view('AdminPusat.Berita.DataBerita.create');
    }

    public function storeprosess(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->file('foto2')->store('berita', 'public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->file('foto3')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('databerita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('AdminPusat.Berita.DataBerita.edit', compact('berita'));
    }

    public function editprosess(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        if ($request->hasFile('foto2')) {
            if ($berita->foto2) {
                Storage::disk('public')->delete($berita->foto2);
            }
            $data['foto2'] = $request->file('foto2')->store('berita', 'public');
        }

        if ($request->hasFile('foto3')) {
            if ($berita->foto3) {
                Storage::disk('public')->delete($berita->foto3);
            }
            $data['foto3'] = $request->file('foto3')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('databerita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto) Storage::disk('public')->delete($berita->foto);
        if ($berita->foto2) Storage::disk('public')->delete($berita->foto2);
        if ($berita->foto3) Storage::disk('public')->delete($berita->foto3);

        $berita->delete();

        return redirect()->route('databerita')->with('success', 'Berita berhasil dihapus.');
    }
}
