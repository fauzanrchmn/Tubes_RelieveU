@extends('layouts.app')

@section('content')
    <h1>Doctor Appointments</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">Add Appointment</a>
    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Doctor</th>
                <th>Specialization</th>
                <th>Location</th>
                <th>Appointment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient_name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->specialization }}</td>
                    <td>{{ $appointment->location }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
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
