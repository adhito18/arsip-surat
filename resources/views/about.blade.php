@extends('layouts.master')

@section('title', 'About')
@section('content')

<div>
    <h1>About</h1>
    <div class="row">
        <div class="col-md-3 col-lg-2">
            <img src="{{ asset('storage/Adhito.jpg') }}" alt="adhito henry " class="img-fluid">
        </div>
        <div class="col-md-9 col-lg-10">
            Aplikasi ini dibuat oleh:
            <table>
                <tr>
                    <td style="width: 70px;">Nama</td>
                    <td>: Adhito Henry Alvin Alfirnanda</td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>: D3-MAMANAJEMEN INFORMATIKA PSDKU KOTA KEDIRI</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: 2331730100</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: 29 September 2025</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
