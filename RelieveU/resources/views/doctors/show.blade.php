@extends('layouts.app')

@section('content')
    <h1>Doctor Details</h1>
    <table class="table">
        <tr>
            <th>Name:</th>
            <td>{{ $doctor->name }}</td>
        </tr>
        <tr>
            <th>Specialization:</th>
            <td>{{ $doctor->specialization }}</td>
        </tr>
        <tr>
            <th>Experience (Years):</th>
            <td>{{ $doctor->experience_years }}</td>
        </tr>
        <tr>
            <th>Profile:</th>
            <td>{{ $doctor->profile }}</td>
        </tr>
    </table>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
