<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::with('kelas', 'spp')->get(); 
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelass = Kelas::all();
        $spps = Spp::all();
        return view('siswa.create', compact('kelass', 'spps')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:10|unique:siswa,nisn',
            'nis' => 'required|string|max:8|unique:siswa,nis',
            'nama' => 'required|string|max:35',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'nullable|string',
            'no_telp' => 'required|string|max:13',
            'id_spp' => 'required|exists:spp,id',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit($nisn) 
    {
        $siswa = Siswa::where('nisn', $nisn)->first();
        $kelass = Kelas::all();
        $spps = Spp::all();

        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan');
        }

        return view('siswa.edit', compact('siswa', 'kelass', 'spps'));
    }

    public function update(Request $request, $nisn)
    {   
        $request->validate([
            'nisn' => 'required|string|max:10|unique:siswa,nisn,'.$nisn.',nisn',
            'nis' => 'required|string|max:8|unique:siswa,nis,'.$nisn.',nisn',
            'nama' => 'required|string|max:35',
            'id_kelas' => 'required|exists:kelas,id',
            'alamat' => 'nullable|string',
            'no_telp' => 'required|string|max:13',
            'id_spp' => 'required|exists:spp,id',
        ]);

        $siswa = Siswa::where('nisn', $nisn)->first();
        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan');
        }

        $siswa->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate');
    }

    public function destroy($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->first();

        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan');
        }

        try {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Siswa gagal dihapus');
        }
    }
}