<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $meja = Meja::orderBy('id', 'asc')->get();
        return view('meja.index', compact('meja'));
    }

    public function create()
    {
        return view('meja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_meja' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'zona' => 'required|in:Indoor,VIP',
            'status' => 'required|in:Tersedia,Terisi',
        ]);

        Meja::create($request->all());

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $meja = Meja::findOrFail($id);
        return view('meja.edit', compact('meja'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_meja' => 'required|string|max:255',
            'kapasitas' => 'required|integer',
            'zona' => 'required|in:Indoor,VIP',
            'status' => 'required|in:Tersedia,Terisi',
        ]);

        $meja = Meja::findOrFail($id);
        $meja->update($request->all());

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();

        return redirect()->route('meja.index')->with('success', 'Data meja berhasil dihapus!');
    }
}