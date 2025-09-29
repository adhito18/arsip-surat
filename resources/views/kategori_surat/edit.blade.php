@extends('layouts.master')

@section('title', 'Edit Kategori Surat')
@section('content')

<div class="atas">
    <h1>Kategori Surat >> Edit</h1>
    <p>
        Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk
        <br>mengklik tombol "Update"
    </p>
</div>

<div class="konten mt-5">
    <form action="{{ route('kategori.surat.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label fw-bold">Nama Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" style="width: 50%;" value="{{ $data->nama }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="id" class="col-sm-2 col-form-label fw-bold">Keterangan</label>
            <div class="col-sm-10">
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required>{{ $data->keterangan }}</textarea>
            </div>
        </div>

        <a href="{{ route('kategori.surat.index') }}" class="btn btn-danger me-2"><< Kembali</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@endsection