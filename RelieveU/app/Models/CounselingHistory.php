<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'hospital_id',
        'appointment_date',
        'status',
    ];

    // Relasi dengan dokter
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // Relasi dengan rumah sakit
    public function hospital()
    {
        return $this->belongsTo(Hospital::class); // Anda perlu membuat model Hospital
    }
}