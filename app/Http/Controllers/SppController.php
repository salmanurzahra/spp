<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp; 

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $spp = Spp::all(); 
        return view('spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spp.create'); // Return the create form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tahun' => 'required|integer',
            'nominal' => 'required|numeric',
        ]);

        // Create a new SPP record
        Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('spp.index')->with('success', 'SPP Berhasil Di Tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spp = Spp::findOrFail($id);
        return view('spp.show', compact('spp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'tahun' => 'required|integer',
            'nominal' => 'required|numeric',
        ]);

        // Find the SPP record and update it
        $spp = Spp::findOrFail($id);
        $spp->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('spp.index')->with('success', 'SPP Berhasil Di Simpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();

        return redirect()->route('spp.index')->with('success', 'SPP Berhasil Di Hapus.');
    }
}