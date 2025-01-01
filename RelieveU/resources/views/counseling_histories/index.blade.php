@extends('layouts.app')

@section('content')
    <h1>Counseling History</h1>
    <a href="{{ route('counseling_histories.create') }}" class="btn btn-primary">Add New Counseling History</a>
    <table class="table">
        <thead>
            <tr>
                <th>Doctor</th>
                <th>Hospital</th>
                <th>Appointment Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($counselingHistories as $history)
                <tr>
                    <td>{{ $history->doctor->name }}</td>
                    <td>{{ $history->hospital->name }}</td>
                    <td>{{ $history->appointment_date }}</td>
                    <td>{{ $history->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
