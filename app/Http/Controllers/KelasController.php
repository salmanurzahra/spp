<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class KelasController extends Controller
{
    public function index() {
        $kelases = Kelas::paginate(5); 
        return view('kelas.index', compact('kelases'));
    }

    public function create()
    {
        return view('kelas.create'); 
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas,nama_kelas',  // unik berdasarkan nama_kelas
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit($nama_kelas) 
    {
        $kelas = Kelas::where('nama_kelas', $nama_kelas)->first();

        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak ditemukan');
        }

        return view('kelas.edit', compact('kelas'));
    }

    public function destroy($nama_kelas)
    {
        $kelas = Kelas::where('nama_kelas', $nama_kelas)->first();

        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak ditemukan');
        }

        try {
            $kelas->delete();
            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Kelas gagal dihapus');
        }
    }
    
    public function update(Request $request, $nama_kelas)
    {   
        $request->validate([
            'nama_kelas' => 'required|string|max:255|unique:kelas,nama_kelas,'.$nama_kelas.',nama_kelas',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        $kelas = Kelas::where('nama_kelas', $nama_kelas)->first();
        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tidak ditemukan');
        }

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diupdate');
    }
}