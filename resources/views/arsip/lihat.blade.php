@extends('layouts.master')

@section('title', 'Lihat Arsip Surat')
@section('content')

<div class="atas">
    <h1>Arsip Surat >> Lihat</h1>
    <table>
        <tr>
            <td style="width: 150px;">Nomor</td>
            <td>{{ $data->nomor_surat }}</td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>{{ $data->relasi_kategori->nama }}</td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>{{ $data->judul }}</td>
        </tr>
        <tr>
            <td>Waktu Unggah</td>
            <td>{{ $data->created_at }}</td>
        </tr>
    </table>
</div>

<div class="konten mt-2">

    <div class="pdf-viewer">
        <iframe src="{{ asset('storage/arsip/' . $data->pdf) }}" 
                width="100%" 
                height="600px"
                style="border:1px solid #ccc;">
        </iframe>
    </div>


    <div class="mt-2">
        <a href="{{ route('arsip.index') }}" class="btn btn-danger me-2"><< Kembali</a>
        <a href="{{ asset('storage/arsip/' . $data->pdf) }}" class="btn btn-warning me-2" download>Unduh</a>
        <a href="{{ route('arsip.edit', $data->id) }}" class="btn btn-primary">Edit/Ganti File</a>
    </div>
</div>

@endsection