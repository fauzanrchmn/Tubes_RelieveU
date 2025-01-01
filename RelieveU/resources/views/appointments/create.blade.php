@extends('layouts.app')

@section('content')
    <h1>Create Appointment</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="patient_name">Patient Name:</label>
            <input type="text" name="patient_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor:</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="datetime-local" name="appointment_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
