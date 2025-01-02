<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingHistory extends Model
{
    use HasFactory;
    protected $table = 'counseling_histories';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'appointment_date',
        'status',
        'doctor_id'
    ];
    // Menyatakan relasi dengan model Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);

    }
}
