@extends('layouts.master')

@section('title', 'Kategori Surat')
@section('content')

<style>
    .search-input {
        background: url("https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/search.svg") no-repeat 10px center;
        background-size: 16px;
        padding-left: 35px;
    }
</style>

<div class="atas">
    <h1>Kategori Surat</h1>
    <p>
        Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.
        <br>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.
    </p>
</div>

<div class="konten mt-5">
    <div class="cari d-flex">
        <form method="GET" class="d-flex align-items-center mb-3 gap-2 w-100">
            <label for="search" class="fw-bold mb-0">Cari Kategori:</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control search-input rounded-pill w-50" placeholder="search">
            <button type="submit" class="btn btn-primary">Cari!</button>
        </form>
    </div>


    <div class="tabel mt-2">
        <table class="table table-bordered">
            <thead class="table-secondary text-center">
                <tr>
                    <th style="width: 10%">ID Kategori</th>
                    <th style="width: 20%">Nama</th>
                    <th style="width: 55%">Keterangan</th>
                    <th style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="text-center">
                        <form action="{{ route('kategori.surat.destroy', $item->id) }}" method="post" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete">Hapus</button>
                            <a href="{{ route('kategori.surat.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            {{ $data->links() }}
        </div>
    </div>

    <a href="{{ route('kategori.surat.create') }}" class="btn btn-success">[+] Tambah Kategori Baru...</a>
</div>

@endsection