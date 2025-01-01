@extends('layouts.app')

@section('content')
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $doctorAppointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="patient_name">Patient Name:</label>
            <input type="text" name="patient_name" class="form-control" value="{{ old('patient_name', $doctorAppointment->patient_name) }}" required>
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor:</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $doctor->id == $doctorAppointment->doctor_id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $doctorAppointment->specialization) }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $doctorAppointment->location) }}" required>
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="datetime-local" name="appointment_date" class="form-control" value="{{ old('appointment_date', \Carbon\Carbon::parse($doctorAppointment->appointment_date)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
