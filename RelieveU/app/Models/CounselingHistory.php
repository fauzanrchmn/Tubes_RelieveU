<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingHistory extends Model
{
    use HasFactory;

    // Menyatakan relasi dengan model Doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
