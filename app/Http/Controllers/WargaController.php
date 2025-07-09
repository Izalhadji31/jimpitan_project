<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $warga = Warga::when($search, function($q) use ($search) {
            return $q->where('nama', 'like', "%$search%");
        })->get();

        return view('warga.index', compact('warga', 'search'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_warga' => 'required|unique:wargas',
            'no_hp' => 'required',
            'username' => 'required|unique:wargas',
            'password' => 'required',
            'rt' => 'required'
        ]);

        Warga::create([
            'nama' => $request->nama,
            'id_warga' => $request->id_warga,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'rt' => $request->rt,
        ]);

        return redirect()->route('warga.index')->with('success', 'Data warga ditambahkan');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $warga->update([
            'nama' => $request->nama,
            'id_warga' => $request->id_warga,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'rt' => $request->rt,
        ]);

        return redirect()->route('warga.index')->with('success', 'Data warga diperbarui');
    }

    public function destroy($id)
    {
        Warga::destroy($id);
        return back()->with('success', 'Data warga dihapus');
    }
}
