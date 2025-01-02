@extends('layouts.app')

@section('content')
    <h1>Edit Artikel</h1>

    <form action="{{ route('contents.update', $content) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $content->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $content->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('contents.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
