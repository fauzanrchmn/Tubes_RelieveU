<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'status', // Status: "In Progress", "Completed"
        'notes', // Catatan dari konseling
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}