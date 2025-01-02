@extends('layouts.app')

@section('content')
    <h1>Add Doctor</h1>
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" id="specialization" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="experience_years">Experience (Years):</label>
            <input type="number" name="experience_years" id="experience_years" class="form-control" min="0" required>
        </div>

        <div class="form-group">
            <label for="profile">Profile:</label>
            <textarea name="profile" id="profile" class="form-control" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
