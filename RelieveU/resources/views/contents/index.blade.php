@extends('layouts.app')

@section('content')
    <h1>Artikel List</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('contents.create') }}" class="btn btn-primary mb-3">Add Artikel</a>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>
                        <a href="{{ route('contents.show', $content) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('contents.edit', $content) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('contents.destroy', $content) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
