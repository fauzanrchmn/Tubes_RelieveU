@extends('layouts.app')

@section('content')
    <h1>Content List</h1>
    <a href="{{ route('contents.create') }}">Add Content</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content)
                <tr>
                    <td>{{ $content->title }}</td>
                    <td>{{ $content->type }}</td>
                    <td>
                        <a href="{{ route('contents.show', $content) }}">View</a>
                        <form action="{{ route('contents.destroy', $content) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
