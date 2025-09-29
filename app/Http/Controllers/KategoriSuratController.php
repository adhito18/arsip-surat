<?php

namespace App\Http\Controllers;

use App\Models\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    public function index(Request $request)
    {
        $query = KategoriSurat::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('id', 'asc')->paginate(5);

        return view('kategori_surat.index', compact('data'));
    }


    public function create()
    {
        return view('kategori_surat.create');
    }

    public function store(Request $request)
    {
        KategoriSurat::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('kategori.surat.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = KategoriSurat::find($id);
        $data->delete();
        return redirect()->route('kategori.surat.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data = KategoriSurat::find($id);
        return view('kategori_surat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = KategoriSurat::find($id);
        $data->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('kategori.surat.index')->with('success', 'Data Berhasil Diupdate');
    }
}
