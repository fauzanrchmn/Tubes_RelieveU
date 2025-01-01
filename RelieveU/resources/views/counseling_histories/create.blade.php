@extends('layouts.app')

@section('content')
    <h1>Create Counseling History</h1>
    <form action="{{ route('counseling_histories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="doctor_id">Doctor:</label>
            <select name="doctor_id" class="form-control" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
