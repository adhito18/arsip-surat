@extends('layouts.master')

@section('title', 'Arsip Surat')
@section('content')

<style>
    .search-input {
        background: url("https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/search.svg") no-repeat 10px center;
        background-size: 16px;
        padding-left: 35px;
    }
</style>

<div class="atas">
    <h1>Arsip Surat</h1>
    <p>
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.
    </p>
</div>

<div class="konten mt-5">
    <div class="cari d-flex">
        <form method="GET" class="d-flex align-items-center mb-3 gap-2 w-100">
            <label for="search" class="fw-bold mb-0">Cari Surat:</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control search-input rounded-pill w-50" placeholder="search">
            <button type="submit" class="btn btn-primary">Cari!</button>
        </form>
    </div>

    <div class="tabel mt-2">
        <table class="table table-bordered">
            <thead class="table-secondary text-center">
                <tr>
                    <th style="width: 10%">Nomor Surat</th>
                    <th style="width: 15%">Kategori</th>
                    <th style="width: 40%">Judul</th>
                    <th style="width: 15%">Waktu Pengarsipan</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td class="text-center">{{ $item->nomor_surat }}</td>
                    <td>{{ $item->relasi_kategori->nama }}</td>
                    <td>{{ $item->judul }}</td>
                    <td class="text-center">{{ $item->created_at }}</td>
                    <td class="text-center">
                        <form action="{{ route('arsip.destroy', $item->id) }}" method="post" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete">Hapus</button>
                            <a href="{{ asset('storage/arsip/' . $item->pdf) }}" class="btn btn-warning" download>Unduh</a>
                            <a href="{{ route('arsip.lihat', $item->id) }}" class="btn btn-primary">Lihat>></a>
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

    <a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
</div>



@endsection