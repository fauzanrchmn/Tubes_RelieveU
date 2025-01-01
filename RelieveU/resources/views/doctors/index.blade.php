@extends('layouts.app')

@section('content')
    <h1>Doctors List</h1>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New Doctor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Specialization</th>
                <th>Experience (Years)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                    <td>{{ $doctor->experience_years }}</td>
                    <td>
                        <a href="{{ route('doctors.show', $doctor->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
