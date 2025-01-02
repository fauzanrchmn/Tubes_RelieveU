@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center vh-100" style="background-color: #ffe5e5;">
        <div class="container" style="background-color: #ffffff; border-radius: 10px; padding: 20px; max-width: 900px;">
            <div class="text-center mb-4">
            </div>
            <h1 class="mb-4 text-center text-danger">Admin Dashboard</h1>

            <div class="d-flex justify-content-center mb-4">
                <div class="card mx-2 border-0" style="background-color: #ffe5e5; width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Total Doctors</h5>
                        <p class="card-text text-muted">{{ $totalDoctors }}</p>
                    </div>
                </div>

                <div class="card mx-2 border-0" style="background-color: #ffe5e5; width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Total Appointments</h5>
                        <p class="card-text text-muted">{{ $totalAppointments }}</p>
                    </div>
                </div>

                <div class="card mx-2 border-0" style="background-color: #ffe5e5; width: 18rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title text-danger">Total Counseling Histories</h5>
                        <p class="card-text text-muted">{{ $totalCounselingHistories }}</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <h3 class="text-danger">Recent Counseling Histories</h3>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr class="text-danger">
                                <th>Doctor</th>
                                <th>Appointment Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentCounselingHistories as $history)
                                <tr>
                                    <td>{{ $history->doctor->name }}</td>
                                    <td>{{ $history->appointment_date }}</td>
                                    <td>{{ $history->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
