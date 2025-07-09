<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jimpitan;
use App\Models\Warga;

class JimpitanController extends Controller
{
    // Tampil semua data jimpitan (admin)
    public function index(Request $request)
    {
        $search = $request->search;

        $jimpitan = Jimpitan::with('warga')
            ->when($search, function($query) use ($search) {
                return $query->where('nama_warga', 'like', "%$search%");
            })
            ->get();

        return view('jimpitan.index', compact('jimpitan', 'search'));
    }

    // Form tambah data jimpitan
    public function create()
    {
        $wargas = Warga::all();
        return view('jimpitan.create', compact('wargas'));
    }

    // Simpan data jimpitan baru
    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        $warga = Warga::findOrFail($request->warga_id);

        Jimpitan::create([
            'warga_id' => $warga->id,
            'nama_warga' => $warga->nama,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('jimpitan.index')->with('success', 'Data jimpitan ditambahkan');
    }

    // Form edit data jimpitan
    public function edit($id)
    {
        $jimpitan = Jimpitan::findOrFail($id);
        $wargas = Warga::all();
        return view('jimpitan.edit', compact('jimpitan', 'wargas'));
    }

    // Update data jimpitan
    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id' => 'required|exists:wargas,id',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        $jimpitan = Jimpitan::findOrFail($id);
        $warga = Warga::findOrFail($request->warga_id);

        $jimpitan->update([
            'warga_id' => $warga->id,
            'nama_warga' => $warga->nama,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect()->route('jimpitan.index')->with('success', 'Data jimpitan diperbarui');
    }

    // Hapus data jimpitan
    public function destroy($id)
    {
        Jimpitan::destroy($id);
        return back()->with('success', 'Data jimpitan dihapus');
    }

    // Khusus user: hanya lihat data jimpitan miliknya
    public function indexUser()
    {
        $warga = auth()->user();

        // Asumsi username di User sama dengan di Warga
        $wargaData = Warga::where('username', $warga->username)->first();

        $jimpitan = [];
        if ($wargaData) {
            $jimpitan = Jimpitan::where('warga_id', $wargaData->id)->get();
        }

        return view('jimpitan.user', compact('jimpitan'));
    }
}
