@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Counseling Histories</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('counseling_histories.create') }}" class="btn btn-primary mb-3">Add New Counseling History</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($counselingHistories as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->doctor->name }}</td>
                    <td>{{ $history->appointment_date }}</td>
                    <td>{{ ucfirst($history->status) }}</td>
                    <td>
                        <a href="{{ route('counseling_histories.edit', $history->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
