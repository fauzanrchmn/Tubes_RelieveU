@extends('layouts.app')

@section('content')
    <h1>Detail Berita Acara</h1>
    <table class="table">
        <tr>
            <th>Judul:</th>
            <td>{{ $content->title }}</td>
        </tr>
        <tr>
            <th>Deskripsi:</th>
            <td>{{ $content->description ?? 'Tidak ada deskripsi.' }}</td>
        </tr>
    </table>
    <a href="{{ route('contents.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
