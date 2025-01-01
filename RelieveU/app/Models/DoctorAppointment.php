<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'doctor_id',
        'specialization',
        'location',
        'appointment_date',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}