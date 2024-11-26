<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Show all payments
    public function index()
    {
        $pembayaran = Pembayaran::with(['siswa', 'spp'])->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    // Show form to create a new payment
    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.create', compact('siswa','spp'));
    }

    // Store a new payment
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'tgl_bayar' => 'required|date',
            'bulan_dibayar' => 'required|string|max:12',
            'tahun_dibayar' => 'required|string|max:4',
            'jumlah_bayar' => 'required|integer',
        ]);

        Pembayaran::create($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Payment created successfully.');
    }

    // Show a specific payment
    public function show($id)
    {
        $pembayaran = Pembayaran::with(['siswa', 'spp'])->findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }

    // Show form to edit a payment
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.edit', compact('pembayaran', 'siswa', 'spp'));
    }

    // Update a payment
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'tgl_bayar' => 'required|date',
            'bulan_dibayar' => 'required|string|max:12',
            'tahun_dibayar' => 'required|string|max:4',
            'jumlah_bayar' => 'required|integer',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());

        return redirect()->route('pembayaran.index')->with('success', 'Payment updated successfully.');
    }

    // Delete a payment
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Payment deleted successfully.');
    }
}