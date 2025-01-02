@extends('layouts.app')

@section('content')
    <h1>Add Content</h1>
    <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="type">Type:</label>
        <select name="type" id="type" required>
            <option value="Poster">Poster</option>
            <option value="Video">Video</option>
            <option value="Artikel">Artikel</option>
            <option value="Tips & Trik">Tips & Trik</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <label for="file">File (optional):</label>
        <input type="file" name="file" id="file">

        <button type="submit">Save</button>
    </form>
@endsection
