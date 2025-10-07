<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return view('tampilan', compact('pemesanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'nomor_identitas' => 'required|size:16',
            'tipe_kamar' => 'required',
            'harga' => 'required|numeric',
            'tanggal_pesan' => 'required',
            'durasi' => 'required|numeric|min:1',
            'total_bayar' => 'required|numeric',
        ]);

        $validated['breakfast'] = $request->has('breakfast') ? 1 : 0;

        Pemesanan::create($validated);

        return redirect()->route('tampilan')->with('success', 'Pemesanan berhasil disimpan!');
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('edit', compact('pemesanan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'nomor_identitas' => 'required|size:16',
            'tipe_kamar' => 'required',
            'harga' => 'required|numeric',
            'tanggal_pesan' => 'required',
            'durasi' => 'required|numeric|min:1',
            'total_bayar' => 'required|numeric',
        ]);

        $validated['breakfast'] = $request->has('breakfast') ? 1 : 0;

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($validated);

        return redirect()->route('tampilan')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('tampilan')->with('success', 'Pemesanan berhasil dihapus!');
    }
}