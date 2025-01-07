@extends('layouts.app')

@section('content')
    <h1>Add Berita Acara</h1>

    <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('contents.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
