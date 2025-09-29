@extends('layouts.master')

@section('title', 'Edit Arsip Surat')
@section('content')

<div class="atas">
    <h1>Arsip Surat >> Edit</h1>
    <p class="m-0">
        Unggah surat yang telah terbit pada form ini untuk diarsipkan.
        <br>Catatan:
    </p>
    <ul>
        <li>Gunakan file berformat PDF</li>
    </ul>
</div>

<div class="konten mt-5">
    <form action="{{ route('arsip.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label fw-bold">Nomor Surat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nomor" id="nomor" style="width: 30%;" value="{{ $data->nomor_surat }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label fw-bold">Kategori</label>
            <div class="col-sm-10">
                <select name="kategori" id="kategori" class="form-select" style="width: 50%;" required> 
                    @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $data->kategori == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label fw-bold">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $data->judul }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label fw-bold">File Surat(PDF)</label>
            <div class="col-sm-10">
                <div class="mb-2">
                    <p>File saat ini: <a href="{{ asset('storage/arsip/' . $data->pdf) }}" target="_blank">Lihat PDF</a></p>
                </div>
                <input type="file" class="form-control" name="file" id="file" style="width: 30%;" accept="application/pdf">

            </div>
        </div>

        <a href="{{ route('arsip.lihat', $data->id) }}" class="btn btn-danger me-2"><< Kembali</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@endsection