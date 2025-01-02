@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Counseling History</h1>

    <form action="{{ route('counseling_histories.update', $counselingHistory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="doctor_id" class="form-label">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-select">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $counselingHistory->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="appointment_date" class="form-label">Appointment Date</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="{{ $counselingHistory->appointment_date }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="completed" {{ $counselingHistory->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="pending" {{ $counselingHistory->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="cancelled" {{ $counselingHistory->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('counseling_histories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
