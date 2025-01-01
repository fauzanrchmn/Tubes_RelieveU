@extends('layouts.app')

@section('content')
    <h1>Edit Doctor</h1>
    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $doctor->name }}" required>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" id="specialization" class="form-control" value="{{ $doctor->specialization }}" required>
        </div>

        <div class="form-group">
            <label for="experience_years">Experience (Years):</label>
            <input type="number" name="experience_years" id="experience_years" class="form-control" value="{{ $doctor->experience_years }}" min="0" required>
        </div>

        <div class="form-group">
            <label for="profile">Profile:</label>
            <textarea name="profile" id="profile" class="form-control" rows="5">{{ $doctor->profile }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
