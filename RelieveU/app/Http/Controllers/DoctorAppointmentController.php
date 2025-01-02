<?php

namespace App\Http\Controllers;

use App\Models\DoctorAppointment;
use App\Models\Doctor;
use App\Http\Requests\StoreDoctorAppointmentRequest;
use App\Http\Requests\UpdateDoctorAppointmentRequest;
use Illuminate\Http\Request;

class DoctorAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = DoctorAppointment::with('doctor')->get();
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('appointments.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'specialization' => 'required',
            'location' => 'required',
            'appointment_date' => 'required|date',
        ]);

        DoctorAppointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorAppointment $doctorAppointment)
    {
        return view('appointments.show', compact('doctorAppointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorAppointment $doctorAppointment)
    {
        $doctors = Doctor::all();
        return view('appointments.edit', compact('doctorAppointment', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoctorAppointment $doctorAppointment)
    {
        $request->validate([
            'patient_name' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'specialization' => 'required',
            'location' => 'required',
            'appointment_date' => 'required|date',
        ]);

        $doctorAppointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorAppointment $doctorAppointment)
    {
        $doctorAppointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}