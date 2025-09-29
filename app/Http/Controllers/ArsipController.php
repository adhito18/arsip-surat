<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Arsip::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('id', 'asc')->paginate(5);
        return view('arsip.index', compact('data'));
    }

    public function lihat($id)
    {
        $data = Arsip::find($id);
        return view('arsip.lihat', compact('data'));
    }

    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('arsip', $filename, 'public');
        }

        Arsip::create([
            'nomor_surat' => $request->nomor,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'pdf' => $filename,
            'created_at' => now(),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $data = Arsip::findOrFail($id);

        if ($data->pdf && Storage::disk('public')->exists('arsip/' . $data->pdf)) {
            Storage::disk('public')->delete('arsip/' . $data->pdf);
        }

        $data->delete();
        return redirect()->route('arsip.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $data = Arsip::find($id);
        $kategori = KategoriSurat::all();
        return view('arsip.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = Arsip::findOrFail($id);

        $data->nomor_surat = $request->nomor;
        $data->kategori = $request->kategori;
        $data->judul = $request->judul;

        if ($request->hasFile('file')) {
            if ($data->pdf && Storage::disk('public')->exists('arsip/' . $data->pdf)) {
                Storage::disk('public')->delete('arsip/' . $data->pdf);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('arsip', $filename, 'public');

            $data->pdf = $filename;
        }

        $data->save();

        return redirect()->route('arsip.lihat', $id)->with('success', 'Data Berhasil Diperbarui');
    }
}
